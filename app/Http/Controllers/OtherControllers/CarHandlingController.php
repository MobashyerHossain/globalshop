<?php

namespace App\Http\Controllers\OtherControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\MultiAuth\Consumer;
use App\Models\Product\Car;
use App\Models\Purchase\CarBooking;
use App\Models\Purchase\LoanInfo;
use App\Models\Purchase\TestDriving;
use App\Http\Controllers\ModelControllers\ImageController;

use App\Notifications\CarHandler\CarBookingNotification;
use App\Notifications\CarHandler\CarTestDrivingNotification;
use App\Notifications\CarHandler\ApplyForLoanNotification;

class CarHandlingController extends Controller
{
    //find and show form
    public function findForm($form_type, $car_id){
        $car = Car::find($car_id);
        if(count($car) > 0){
            return redirect()->route('show.carHandling.form', ['form_type' => $form_type, 'car_maker' => $car->getModel()->getMaker()->name, 'car_model' => $car->getModel()->name, 'car_name' => $car->name]);
        }
        else{
            return view('error.productNotFound');
        }
    }

    public function showForm($form_type, $car_maker, $car_model, $car_name){
        $car = Car::where('name', $car_name)->first();
        if(count($car) > 0){
            return view('multiAuth.consumer.pages.carDetail', ['car' => $car]);
        }
        else{
            return view('error.productNotFound');
        }
    }

    //car booking
    public function bookCar(Request $request){
      $this->validate($request, [
          'advance' => 'required',
          'consumer_id' => 'required',
          'car_id' => 'required',
          'terms' => 'accepted',
      ]);

      if(count(CarBooking::where('consumer_id',$request->Input('consumer_id'))->where('car_id',$request->Input('car_id'))->first()) > 0){
        return redirect()->back()->with('car_already_booked', "A unit of this car is already booked by you. You can not book another unit of the same car without buying the first one!");
      }

      $booking = new CarBooking();
      $booking->status = 'onhold';
      $booking->booking_advance = $request->Input('advance');
      $booking->consumer_id = $request->Input('consumer_id');
      $booking->car_id = $request->Input('car_id');
      $booking->save();

      //send verification mail
      try {
        Auth::user()->notify(new CarBookingNotification(Auth::user()));
      } catch (\Exception $e) {
        return redirect()->back()->with('please_verify', 'Cant connect to internet');
      }

      return redirect()->back()->with('car_booked', 'This car has been booked for 7 days. You can complete your payment (minus the advance) at the showroom and recieve this car');
    }

    //car testing
    public function testDriveCar(Request $request){
      $this->validate($request, [
          'date_of_drive' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
          'consumer_id' => 'required',
          'car_id' => 'required',
          'terms' => 'accepted',
      ]);

      if(count(TestDriving::where('consumer_id',$request->Input('consumer_id'))->where('car_id',$request->Input('car_id'))->first()) > 0){
        return redirect()->back()->with('already_tested', "A unit of this car already tested by you. Please select another car if you are not satisfied");
      }

      $testdriving = new TestDriving();
      $testdriving->date_of_drive = $request->Input('date_of_drive');
      $testdriving->drive_from = $request->Input('start_time');
      $testdriving->drive_to = $request->Input('end_time');
      $testdriving->showroom_id = 1;
      $testdriving->consumer_id = $request->Input('consumer_id');
      $testdriving->car_id = $request->Input('car_id');
      $testdriving->save();

      //send verification mail
      try {
        Auth::user()->notify(new CarTestDrivingNotification(Auth::user()));
      } catch (\Exception $e) {
        return redirect()->back()->with('please_verify', 'Cant connect to internet');
      }

      return redirect()->back()->with('car_test_driven', 'This car has been listed for test drive on '.$request->Input('date_of_drive').' between '.$request->Input('start_time').' and '.$request->Input('end_time').'. Please come on time');
    }

    //car loaning
    public function applyForCarLoan(Request $request){
      $this->validate($request, [
          'applicant_profession' => 'required',
          'requested_percentage' => 'required',
          'national_id' => 'required',
          'bank_statement' => 'required',
          'tex_clearence' => 'required',
      ]);

      if(count(LoanInfo::where('consumer_id',$request->Input('consumer_id'))->where('car_id',$request->Input('car_id'))->first()) > 0){
        return redirect()->back()->with('already_tested', "A unit of this car already tested by you. Please select another car if you are not satisfied");
      }

      $info = new LoanInfo();
      $info->consumer_id = $request->Input('consumer_id');
      $info->car_id = $request->Input('car_id');
      $info->applicant_proffesion = $request->Input('applicant_profession');
      $info->requested_loan_percentage = $request->Input('requested_percentage')/100;

      //upload image
      $nid = (new ImageController)->storeOnlyImage($request, 'national_id', 'images/Others/');
      $bank = (new ImageController)->storeOnlyImage($request, 'bank_statement', 'images/Others/');
      $tax = (new ImageController)->storeOnlyImage($request, 'tex_clearence', 'images/Others/');

      $info->applicant_national_id = $nid->id;
      $info->applicant_bank_statment = $bank->id;
      $info->applicant_tax_clearence = $tax->id;

      if($request->has(['passport'])){
        $passport = (new ImageController)->storeOnlyImage($request, 'passport', 'images/Others/');
        $info->applicant_passport = $passport->id;
      }
      if($request->has(['additional_1'])){
        $add1 = (new ImageController)->storeOnlyImage($request, 'additional_1', 'images/Others/');
        $info->additional_1 = $add1->id;
      }
      if($request->has(['additional_2'])){
        $add2 = (new ImageController)->storeOnlyImage($request, 'additional_2', 'images/Others/');
        $info->additional_2 = $add2->id;
      }

      $info->save();

      //send verification mail
      try {
        Auth::user()->notify(new ApplyForLoanNotification($info));
      } catch (\Exception $e) {
        return redirect()->back()->with('please_verify', 'Cant connect to internet');
      }

      return redirect()->back()->with('loan_applied', 'We have recieved your loan application. We will cantact you after it is approved');
    }
}
