<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

use App\Models\MultiAuth\Admin;
use App\Models\Other\Role;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;
use App\Models\Other\Image;
use App\Http\Controllers\ModelControllers\ImageController;

use App\Mail\AdminRegistration;

class AdminCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('multiAuth.admin.pages.adminList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multiAuth.admin.pages.addAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:show_room_staffs',
            'phone_number' => 'required|string|max:30',
            'local_address' => 'required|string|max:199',
            'postal_code' => 'required|string|max:6',
            'city' => 'required|string|max:20',
            'country' => 'required|string|max:20',
            'job_title' => 'required',
        ]);

        $phone = new PhoneNumber();
        $phone->number = $request->Input('phone_number');
        $phone->save();

        $address = new Address();
        $address->local = $request->Input('local_address');
        $address->postal_code = $request->Input('postal_code');
        $address->city = $request->Input('city');
        $address->country = $request->Input('country');
        $address->save();

        $pro_pic = (new ImageController)->storeOnlyImage($request, 'propic', 'images/Profile Pic/');
        $pass = str_random(10);

        $admin = new Admin();
        $admin->first_name = $request->Input('first_name');
        $admin->last_name = $request->Input('last_name');
        $admin->email = $request->Input('email');
        $admin->password = Hash::make($pass);
        $admin->profile_pic = $pro_pic->id;
        $admin->role_id = $request->Input('job_title');
        $admin->address_id = $address->id;
        $admin->phone_number_id = $phone->id;
        $admin->save();

        try {
          //send email confirmation mail
          Mail::to($admin->email)->send(new AdminRegistration($admin, $pass));
        } catch (\Exception $e) {

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('multiAuth.admin.pages.updateAdmin')->with(['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'phone_number' => 'required|string|max:30',
            'local_address' => 'required|string|max:199',
            'postal_code' => 'required|string|max:6',
            'city' => 'required|string|max:20',
            'country' => 'required|string|max:20',
            'job_title' => 'required',
        ]);

        $admin = Admin::find($id);

        if($request->hasFile('propic')){
            $pro_pic = (new ImageController)->storeOnlyImage($request, 'propic', 'images/Profile Pic/');
            $admin->profile_pic = $pro_pic->id;
        }

        $admin->first_name = $request->Input('first_name');
        $admin->last_name = $request->Input('last_name');
        $admin->email = $request->Input('email');
        $admin->role_id = $request->Input('job_title');
        $admin->save();

        $phone = PhoneNumber::find($admin->phone_number_id);
        $phone->number = $request->Input('phone_number');
        $phone->save();

        $address = Address::find($admin->address_id);
        $address->local = $request->Input('local_address');
        $address->postal_code = $request->Input('postal_code');
        $address->city = $request->Input('city');
        $address->country = $request->Input('country');
        $address->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->back();
    }
}
