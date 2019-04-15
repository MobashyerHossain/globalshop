<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

use App\Models\MultiAuth\ShowRoomStaff;
use App\Models\Purchase\ShowRoom;
use App\Models\Other\Role;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;
use App\Models\Other\Image;
use App\Http\Controllers\ModelControllers\ImageController;

use App\Mail\ShowRoomStaffRegistration;

class ShowRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multiAuth.admin.pages.addShowRoom');
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
            'sr_name' => 'required|string|max:100',
            'sr_email' => 'required|string|max:100',
            'sr_phone_number' => 'required|string|max:30',
            'sr_local_address' => 'required|string|max:199',
            'sr_postal_code' => 'required|string|max:6',
            'sr_city' => 'required|string|max:20',
            'sr_country' => 'required|string|max:20',

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

        $sr_phone = new PhoneNumber();
        $sr_phone->number = $request->Input('sr_phone_number');
        $sr_phone->save();

        $sr_address = new Address();
        $sr_address->local = $request->Input('sr_local_address');
        $sr_address->postal_code = $request->Input('sr_postal_code');
        $sr_address->city = $request->Input('sr_city');
        $sr_address->country = $request->Input('sr_country');
        $sr_address->save();

        $logo = (new ImageController)->storeOnlyImage($request, 'logo', 'images/logos/showroom/');

        $showroom = new ShowRoom();
        $showroom->name = $request->Input('sr_name');
        $showroom->email = $request->Input('sr_email');
        $showroom->website = $request->Input('website');
        $showroom->logo = $logo->id;
        $showroom->address_id = $sr_address->id;
        $showroom->phone_number_id = $sr_phone->id;
        $showroom->save();

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
        $staff = new ShowRoomStaff();
        $staff->first_name = $request->Input('first_name');
        $staff->last_name = $request->Input('last_name');
        $staff->email = $request->Input('email');
        $staff->password = Hash::make($pass);
        $staff->profile_pic = $pro_pic->id;
        $staff->role_id = $request->Input('job_title');
        $staff->showroom_id = $showroom->id;
        $staff->address_id = $address->id;
        $staff->phone_number_id = $phone->id;
        $staff->save();

        try {
          //send email confirmation mail
          Mail::to($staff->email)->send(new ShowRoomStaffRegistration($staff, $pass));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
