<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;

class ShowRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class,1)->create();
        $address = Address::orderBy('created_at', 'desc')->first();
        factory(PhoneNumber::class,1)->create();
        $phone = PhoneNumber::orderBy('created_at', 'desc')->first();

        DB::table('show_rooms')->insert([
            'name' => 'Grim Reaper Cars',
            'address_id' => $address->id,
            'phone_number_id' => $phone->id,
            'email' => 'first@x.com',
        ]);
    }
}
