<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Other\Role;
use App\Models\Purchase\ShowRoom;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;

class ShowRoomStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staffs = array(
            array(
              'first_name' => 'Joker',
              'last_name' => 'Jackle',
              'email' => 'showrs@gmail.com',
              'role_id' => 4,
            ),
            array(
              'first_name' => 'Juvenal',
              'last_name' => 'McCullough',
              'email' => 'McCuianWit@gmail.com',
              'role_id' => 5,
            ),
            array(
              'first_name' => 'Concepcion',
              'last_name' => 'Gerhold',
              'email' => 'GerholdnWit@gmail.com',
              'role_id' => 6,
            ),
        );
        foreach($staffs as $staff) {
          factory(Address::class,1)->create();
          $address = Address::orderBy('created_at', 'desc')->first();
          factory(PhoneNumber::class,1)->create();
          $phone = PhoneNumber::orderBy('created_at', 'desc')->first();

          DB::table('show_room_staffs')->insert([
              'first_name' => $staff['first_name'],
              'last_name' => $staff['last_name'],
              'email' => $staff['email'],
              'password' => Hash::make('741852'),
              'preliminary_password_change' => true,
              'address_id' => $address->id,
              'phone_number_id' => $phone->id,
              'role_id' => $staff['role_id'],
              'showroom_id' => 1,
              'remember_token' => str_random(10),
          ]);
        }
    }
}
