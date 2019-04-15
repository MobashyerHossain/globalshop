<?php

namespace App\Http\Controllers\Auth\AdminControllers;

use App\Models\MultiAuth\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Other\Image;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;

class AdminController extends Controller
{
    //pages control methods
    public function index(){
      return view('multiAuth.admin.pages.dashboard');
    }

    public function profile(){
      return view('multiAuth.admin.pages.profile');
    }

    //other methods
    public function verifyAccount(){
      return route('index');
    }

    public function update(Request $request, $id){
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

        $admin = Admin::find($id);
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->email = $request->input('profile_email');
        $admin->save();

        if($admin->address_id){
          $address = Address::find($admin->address_id);
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
          $admin->address_id = $address->id;
          $admin->save();
        }

        if($admin->phone_number_id){
          $phone = PhoneNumber::find($admin->phone_number_id);
          $phone->number = $request->input('phone_number');
          $phone->save();
        }
        else {
          $phone = new PhoneNumber();
          $phone->number = $request->input('phone_number');
          $phone->save();
          $admin->phone_number_id = $phone->id;
          $admin->save();
        }

        return redirect()->back();
    }
}
