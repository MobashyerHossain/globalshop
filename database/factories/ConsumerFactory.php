<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;
use App\Models\MultiAuth\Consumer;

$factory->define(Consumer::class, function (Faker $faker) {
    factory(Address::class,1)->create();
    $address = Address::orderBy('created_at', 'desc')->first();
    factory(PhoneNumber::class,1)->create();
    $phone = PhoneNumber::orderBy('created_at', 'desc')->first();
    return [
      'first_name' => $faker->firstname,
      'last_name' => $faker->lastname,
      'date_of_birth' => $faker->date,
      'email' => $faker->unique()->safeEmail,
      'password' => Hash::make('741852'),
      'address_id' => $address->id,
      'phone_number_id' => $phone->id,
      'verification_status' => true,
      'remember_token' => str_random(10),
    ];
});
