<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

use App\Models\MultiAuth\ShowRoomStaff;
use App\Models\Other\Role;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;
use App\Models\Other\Image;
use App\Http\Controllers\ModelControllers\ImageController;

use App\Mail\ShowRoomStaffRegistration;

class StaffCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('multiAuth.showroomstaff.pages.staffList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multiAuth.showroomstaff.pages.addStaff');
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
        $staff = new ShowRoomStaff();
        $staff->first_name = $request->Input('first_name');
        $staff->last_name = $request->Input('last_name');
        $staff->email = $request->Input('email');
        $staff->password = Hash::make($pass);
        $staff->profile_pic = $pro_pic->id;
        $staff->role_id = $request->Input('job_title');
        $staff->showroom_id = Auth::guard('showroomstaff')->user()->getShowRoom()->id;
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
        $staff = ShowRoomStaff::find($id);
        return view('multiAuth.showroomstaff.pages.updateStaff')->with(['staff' => $staff]);
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

        $staff = ShowRoomStaff::find($id);

        if($request->hasFile('propic')){
            $pro_pic = (new ImageController)->storeOnlyImage($request, 'propic', 'images/Profile Pic/');
            $staff->profile_pic = $pro_pic->id;
        }

        $staff->first_name = $request->Input('first_name');
        $staff->last_name = $request->Input('last_name');
        $staff->email = $request->Input('email');
        $staff->role_id = $request->Input('job_title');
        $staff->save();

        $phone = PhoneNumber::find($staff->phone_number_id);
        $phone->number = $request->Input('phone_number');
        $phone->save();

        $address = Address::find($staff->address_id);
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
        $staff = ShowRoomStaff::find($id);
        $staff->delete();

        return redirect()->back();
    }
}
