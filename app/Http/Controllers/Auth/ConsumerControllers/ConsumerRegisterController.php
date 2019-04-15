<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Models\MultiAuth\Consumer;
use App\Models\Other\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelControllers\ImageController;
use App\Notifications\Registration\ConsumerRegistrationNotification;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ConsumerRegisterController extends Controller
{
    public function show(){
      return redirect()->route('index');
    }

    protected function validation($request){
        return $this->validate($request, [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:consumers',
            'reg_password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register(Request $request){
        $this->validation($request);

        //create user
        $consumer = Consumer::create([
          'first_name' => $request->Input('first_name'),
          'last_name' => $request->Input('last_name'),
          'email' => $request->Input('email'),
          'password' => Hash::make($request->Input('reg_password')),
        ]);

        //send verification mail
        try {
          $consumer->notify(new ConsumerRegistrationNotification($consumer));
        } catch (\Exception $e) {
          return redirect()->back()->with('please_verify', 'Cant connect to internet');
        }
        return redirect()->back()->with('please_verify', 'We have sent you an email. Please confirm!');
    }
}
