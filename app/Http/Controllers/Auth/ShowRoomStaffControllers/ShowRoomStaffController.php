<?php

namespace App\Http\Controllers\Auth\ShowRoomStaffControllers;

use App\Models\MultiAuth\ShowRoomStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Other\Image;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;
use App\Models\Product\Part;
use App\Models\Product\Car;

class ShowRoomStaffController extends Controller
{
    //pages control methods
    public function index(){
      return view('multiAuth.showroomstaff.pages.dashboard');
    }

    public function showProfile(){
      return view('multiAuth.showroomstaff.pages.profile');
    }

    public function addProduct(){
      return view('multiAuth.showroomstaff.pages.addProduct');
    }

    public function updateProduct($type,$id){
      if($type == 'part'){
        $part = Part::find($id);
        return view('multiAuth.showroomstaff.pages.updatePart')->with(['part' => $part]);
      }
      else {
        $car = Car::find($id);
        return view('multiAuth.showroomstaff.pages.updateCar')->with(['car' => $car]);
      }
    }

    public function showInventory(){
      return view('multiAuth.showroomstaff.pages.inventory');
    }

    public function verifyAccount(){
      return route('index');
    }

    public function updateProfile(Request $request, $id){
        $this->validate($request, [
          'first_name' => 'required|max:100',
          'last_name' => 'required|max:100',
          'profile_email' => 'email|required|max:100',
          'local_address' => 'required|max:199',
          'phone_number' => 'required|max:30',
          'postal_code' => 'required|max:6',
          'city' => 'required|max:20',
          'country' => 'required|max:20',
        ]);

        $showroomstaff = ShowRoomStaff::find($id);
        $showroomstaff->first_name = $request->input('first_name');
        $showroomstaff->last_name = $request->input('last_name');
        $showroomstaff->email = $request->input('profile_email');
        $showroomstaff->save();

        if($showroomstaff->address_id){
          $address = Address::find($showroomstaff->address_id);
          $address->local = $request->input('local_address');
          $address->postal_code = $request->input('postal_code');
          $address->city = $request->input('city');
          $address->country = $request->input('country');
          $address->save();
        }
        else {
          $address = new Address();
          $address->local = $request->input('local_address');
          $address->postal_code = $request->input('postal_code');
          $address->city = $request->input('city');
          $address->country = $request->input('country');
          $address->save();
          $showroomstaff->address_id = $address->id;
          $showroomstaff->save();
        }

        if($showroomstaff->phone_number_id){
          $phone = PhoneNumber::find($showroomstaff->phone_number_id);
          $phone->number = $request->input('phone_number');
          $phone->save();
        }
        else {
          $phone = new PhoneNumber();
          $phone->number = $request->input('phone_number');
          $phone->save();
          $showroomstaff->phone_number_id = $phone->id;
          $showroomstaff->save();
        }

        return redirect()->back();
    }
}
