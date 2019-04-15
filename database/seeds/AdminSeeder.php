<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Other\Role;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
            array(
              'first_name' => 'Durgan',
              'last_name' => 'Turner',
              'email' => 'admin@gmail.com',
              'role_id' => 1,
            ),
            array(
              'first_name' => 'Jonatan',
              'last_name' => 'Jakayla',
              'email' => 'Jakayla@gmail.com',
              'role_id' => 2,
            ),
            array(
              'first_name' => 'Muriel',
              'last_name' => 'Schoen',
              'email' => 'MuriSchoenel@gmail.com',
              'role_id' => 3,
            ),
        );
        foreach($admins as $admin) {
          factory(Address::class,1)->create();
          $address = Address::orderBy('created_at', 'desc')->first();
          factory(PhoneNumber::class,1)->create();
          $phone = PhoneNumber::orderBy('created_at', 'desc')->first();

          DB::table('admins')->insert([
              'first_name' => $admin['first_name'],
              'last_name' => $admin['last_name'],
              'email' => $admin['email'],
              'password' => Hash::make('741852'),
              'preliminary_password_change' => true,
              'address_id' => $address->id,
              'phone_number_id' => $phone->id,
              'role_id' => $admin['role_id'],
              'remember_token' => str_random(10),
          ]);
        }
    }
}
