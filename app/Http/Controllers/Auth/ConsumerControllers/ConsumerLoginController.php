<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ConsumerLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:consumer', ['except' => ['consumerLogout']]);
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
      if (Auth::guard('consumer')->attempt(['email' => $request->logemail, 'password' => $request->logpassword], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->back();
      }

      //if unsuccessful, than redirect with the form data
      return redirect()->back()->withInput($request->only('logemail', 'logremember'));
    }

    public function consumerLogout()
    {
        Auth::guard('consumer')->logout();
        return redirect()->route('index');
    }
}
