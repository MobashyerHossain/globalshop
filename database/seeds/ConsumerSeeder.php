<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MultiAuth\Consumer::class,10)->create();

        DB::table('consumers')->insert([
            'first_name' => 'Mobashyer',
            'last_name' => 'Hossain',
            'date_of_birth' => '1995-05-28',
            'email' => 'jokerjamil007@gmail.com',
            'password' => Hash::make('741852'),
            'address_id' => 1,
            'phone_number_id' => 1,
            'verification_status' => true,
            'remember_token' => str_random(10),
        ]);
    }
}
