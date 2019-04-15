<?php

namespace App\Http\Controllers\OtherControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mail;

use App\Models\MultiAuth\Consumer;
use App\Models\Product\Car;
use App\Models\Product\CarMaker;
use App\Models\Product\CarModel;
use App\Models\Product\Part;
use App\Models\Product\PartCategory;
use App\Models\Product\PartSubCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Purchase\ResentView;
use App\Models\Purchase\Invoice;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;

use App\Mail\DigitalReciept;

class ProductController extends Controller
{
    public function findCar($carId){
        $car = Car::find($carId);
        if ($car) {
            if (Auth::check()) {
                //updating cars sub level view
                $view = ResentView::where('consumer_id', Auth::id())->where('product_type', 'car')->where('product_id', $car->id)->first();
                if(count($view) > 0){
                  $view->times_visited = $view->times_visited+1;
                  $view->save();
                }
                else{
                  $view = new ResentView();
                  $view->product_type = 'car';
                  $view->product_id = $car->id;
                  $view->consumer_id = Auth::id();
                  $view->save();
                }

                //updating carmodel sub level view
                $viewSub = ResentView::where('consumer_id', Auth::id())->where('product_type', 'carmodel')->where('product_id', $car->getModel()->id)->first();
                if(count($viewSub) > 0){
                  $viewSub->times_visited = $viewSub->times_visited+1;
                  $viewSub->save();
                }
                else{
                  $viewSub = new ResentView();
                  $viewSub->product_type = 'carmodel';
                  $viewSub->product_id = $car->getModel()->id;
                  $viewSub->consumer_id = Auth::id();
                  $viewSub->save();
                }
            }
            return redirect()->route('show.car.details', ['carMakerName' => $car->getModel()->getMaker()->name, 'carModelName' => $car->getModel()->name, 'carName' => $car->name]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function showCar($carMakerName, $carModelName, $carName){
        $car = Car::where('name', $carName)->first();
        if($car){
          return view('multiAuth.consumer.pages.carDetail', ['car' => $car]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function findPart($partId){
        $part = Part::find($partId);
        if ($part) {
            if (Auth::check()) {
                //updating parts view
                $view = ResentView::where('consumer_id', Auth::id())->where('product_type', 'part')->where('product_id', $part->id)->first();
                if(count($view) > 0){
                  $view->times_visited = $view->times_visited+1;
                  $view->save();
                }
                else{
                  $view = new ResentView();
                  $view->product_type = 'part';
                  $view->product_id = $part->id;
                  $view->consumer_id = Auth::id();
                  $view->save();
                }

                //updating partsubcategory sub level view
                $viewSub = ResentView::where('consumer_id', Auth::id())->where('product_type', 'partsubcategory')->where('product_id', $part->getSubCategory()->id)->first();
                if(count($viewSub) > 0){
                  $viewSub->times_visited = $viewSub->times_visited+1;
                  $viewSub->save();
                }
                else{
                  $viewSub = new ResentView();
                  $viewSub->product_type = 'partsubcategory';
                  $viewSub->product_id = $part->getSubCategory()->id;
                  $viewSub->consumer_id = Auth::id();
                  $viewSub->save();
                }
            }
            return redirect()->route('show.part.details', ['partCategoryName' => $part->getSubCategory()->getCategory()->name, 'partSubCategoryName' => $part->getSubCategory()->name, 'partManufacturerName' => $part->getManufacturer()->name, 'partName' => $part->name]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function showPart($partCategoryName, $partSubCategoryName, $partManufacturerName, $partName){
        $part = Part::where('name', $partName)->first();
        if($part){
          return view('multiAuth.consumer.pages.partDetail', ['part' => $part]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    //cars by model
    public function findModel($modelId){
        $carModel = CarModel::find($modelId);
        if ($carModel) {
            if (Auth::check()) {
                $viewSub = ResentView::where('consumer_id', Auth::id())->where('product_type', 'carmodel')->where('product_id', $carModel->id)->first();
                if($viewSub){
                  $viewSub->times_visited = $viewSub->times_visited+1;
                  $viewSub->save();
                }
                else{
                  $viewSub = new ResentView();
                  $viewSub->product_type = 'carmodel';
                  $viewSub->product_id = $carModel->id;
                  $viewSub->consumer_id = Auth::id();
                  $viewSub->save();
                }
            }
            return redirect()->route('show.car.model', ['carMakerName' => $carModel->getMaker()->name, 'modelName' => $carModel->name]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    public function showModel($carMakerName, $modelName){
        $carModel = CarModel::where('name', $modelName)->first();
        if($carModel){
          return view('multiAuth.consumer.pages.carsByModel', ['cars' => $carModel->getCars()]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    //parts by sub categroy
    public function findSubCategory($subCategoryId){
        $partsubCategory = PartSubCategory::find($subCategoryId);
        if ($partsubCategory) {
            if (Auth::check()) {
                $viewSub = ResentView::where('consumer_id', Auth::id())->where('product_type', 'partsubcategory')->where('product_id', $partsubCategory->id)->first();
                if($viewSub){
                  $viewSub->times_visited = $viewSub->times_visited+1;
                  $viewSub->save();
                }
                else{
                  $viewSub = new ResentView();
                  $viewSub->product_type = 'partsubcategory';
                  $viewSub->product_id = $partsubCategory->id;
                  $viewSub->consumer_id = Auth::id();
                  $viewSub->save();
                }
            }
            return redirect()->route('show.part.subCategory', ['partCategoryName' => $partsubCategory->getCategory()->name, 'subCategoryName' => $partsubCategory->name]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    public function showSubCategory($partCategoryName, $subCategoryName){
        $partsubCategory = PartSubCategory::where('name', $subCategoryName)->first();
        if($partsubCategory){
          return view('multiAuth.consumer.pages.partsBySubCategory', ['parts' => $partsubCategory->getParts()]);
        }
        else{
          return view('error.subNotFound', ['x' => 'subcat']);
        }
    }

    //parts by manufacturer
    public function findByManufacturer($partManufacturerId){
        $partManufacturer = PartManufacturer::find($partManufacturerId);
        if ($partManufacturer) {
            return redirect()->route('show.part.manufacturer', ['partManufacturerName' => $partManufacturer->name]);
        }
        else{
            return view('error.subNotFound', ['x' => 'man']);
        }
    }

    public function showByManufacturer($partManufacturerName){
        $partManufacturer = PartManufacturer::where('name', $partManufacturerName)->first();
        if($partManufacturer){
          return view('multiAuth.consumer.pages.partsByManufacturer', ['parts' => $partManufacturer->getParts()]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    //parts by category
    public function findByCategory($partCategoryId){
        $partCategory = PartCategory::find($partCategoryId);
        if ($partCategory) {
            if (Auth::check()) {
                foreach ($partCategory->getSubCategories() as $partsubCategory) {
                    $viewSub = ResentView::where('consumer_id', Auth::id())->where('product_type', 'partsubcategory')->where('product_id', $partsubCategory->id)->first();
                    if(count($viewSub) > 0){
                      $viewSub->times_visited = $viewSub->times_visited+1;
                      $viewSub->save();
                    }
                    else{
                      $viewSub = new ResentView();
                      $viewSub->product_type = 'partsubcategory';
                      $viewSub->product_id = $partsubCategory->id;
                      $viewSub->consumer_id = Auth::id();
                      $viewSub->save();
                    }
                }
            }
            return redirect()->route('show.part.category', ['partCategoryName' => $partCategory->name]);
        }
        else{
            return view('error.subNotFound', ['x' => 'cat']);
        }
    }

    public function showByCategory($partCategoryName){
        $partCategory = PartCategory::where('name', $partCategoryName)->first();
        if($partCategory){
          return view('multiAuth.consumer.pages.partsByCategory', ['partSubCategories' => $partCategory->getSubCategories()]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    //cars by maker
    public function findMaker($carMakerId){
        $carMaker = CarMaker::find($carMakerId);
        if ($carMaker) {
            if (Auth::check()) {
                foreach ($carMaker->getModels() as $carModel) {
                    $viewSub = ResentView::where('consumer_id', Auth::id())->where('product_type', 'carmodel')->where('product_id', $carModel->id)->first();
                    if(count($viewSub) > 0){
                      $viewSub->times_visited = $viewSub->times_visited+1;
                      $viewSub->save();
                    }
                    else{
                      $viewSub = new ResentView();
                      $viewSub->product_type = 'carmodel';
                      $viewSub->product_id = $carModel->id;
                      $viewSub->consumer_id = Auth::id();
                      $viewSub->save();
                    }
                }
            }
            return redirect()->route('show.car.maker', ['carMakerName' => $carMaker->name]);
        }
        else{
            return view('error.subNotFound');
        }
    }

    public function showMaker($carMakerName){
        $carMaker = CarMaker::where('name', $carMakerName)->first();
        if($carMaker){
          return view('multiAuth.consumer.pages.carsByMaker', ['carModels' => $carMaker->getModels()]);
        }
        else{
          return view('error.subNotFound', ['x' => 'mak']);
        }
    }

    //payment complete
    public function checkOut(Request $request){
        if($request->Input('payment_option') == 'cradit card'){
          $this->validate($request, [
            'terms' => 'accepted',
          ]);
        }
        else{
            $this->validate($request, [
              'local_address' => 'required|max:199',
              'phone_number' => 'required|max:30',
              'postal_code' => 'required|max:6',
              'city' => 'required|max:20',
              'country' => 'required|max:20',
              'terms' => 'accepted',
            ]);
            $consumer = Consumer::find(Auth::id());
            if($consumer->address_id){
              $address = Address::find($consumer->address_id);
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
              $consumer->address_id = $address->id;
              $consumer->save();
            }

            if($consumer->phone_number_id){
              $phone = PhoneNumber::find($consumer->phone_number_id);
              $phone->number = $request->input('phone_number');
              $phone->save();
            }
            else {
              $phone = new PhoneNumber();
              $phone->number = $request->input('phone_number');
              $phone->save();
              $consumer->phone_number_id = $phone->id;
              $consumer->save();
            }
            $consumer->save();
        }

        $carts = Auth::user()->getCartProducts();

        $invoce = new Invoice();
        $invoce->total_amount = Auth::user()->getTotalCostPerCart();
        $invoce->consumer_id = Auth::id();
        $invoce->payment_method = $request->Input('payment_option');
        $invoce->save();

        foreach ($carts as $cart) {
            $cart->sold = true;
            $cart->invoice_id = $invoce->id;
            $cart->save();
        }
        try {
          //send digital reciept mail
          Mail::to(Auth::user()->email)->send(new DigitalReciept($invoce));
        } catch (\Exception $e) {

        }

        return redirect()->back()->with('product_check_out', 'You successfully purchased the the products in your cart. The products will be delivered to your home in 3-4 days.');
    }
}
