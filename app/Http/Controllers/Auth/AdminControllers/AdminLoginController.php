<?php

namespace App\Http\Controllers\Auth\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
      
    }

    public function show(){
      return redirect()->route('index');
    }

    public function login(Request $request){
      //validate the form date
      $this->validate($request, [
        'logemail' => 'required|email',
        'logpassword' => 'required'
      ]);

      //attept to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->logemail, 'password' => $request->logpassword], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));
      }

      //if unsuccessful, than redirect with the form data
      return redirect()->back()->withInput($request->only('logemail', 'logremember'));
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
