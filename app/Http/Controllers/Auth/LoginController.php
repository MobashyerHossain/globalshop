<?php

namespace App\Http\Controllers\Auth;

use App\Models\MultiAuth\Consumer;
use App\Models\MultiAuth\Admin;
use App\Models\MultiAuth\ShowRoomStaff;
use App\Http\Controllers\Auth\ConsumerControllers\ConsumerLoginController;
use App\Http\Controllers\Auth\AdminControllers\AdminLoginController;
use App\Http\Controllers\Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        //validate the form data
        $this->validate($request, [
          'logemail' => 'required|email',
          'logpassword' => 'required'
        ]);

        //Validate type of user
        if (count(Admin::where('email', $request->Input('logemail'))->first()) > 0) {
          //if successfull, tha0n redirect to Admin Dashboard
          return (new AdminLoginController)->login($request);
        }
        else if (count(ShowRoomStaff::where('email', $request->Input('logemail'))->first()) > 0) {
          //if successfull, than redirect to ShowRoomStaff Dashboard
          return (new ShowRoomStaffLoginController)->login($request);
        }
        else if (count(Consumer::where('email', $request->Input('logemail'))->first()) > 0) {
          //if successfull, than redirect to Consumer Dashboard
          return (new ConsumerLoginController)->login($request);
        }
        else {
          //if unsuccessfull, return with error
          return redirect()->back()->withInput($request->only('logemail', 'remember'))->with('user_not_found', 'Please check you Email or Register if you are new');
        }
    }
}
