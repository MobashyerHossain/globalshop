<?php

use Faker\Generator as Faker;
use App\Models\Other\Address;

$factory->define(Address::class, function (Faker $faker) {
    $city = array('Dhaka', 'Chittagong', 'Khulna', 'Sylhet', 'Rajshahi', 'Comilla', 'Mymensingh', 'Barisal', 'Rangpur', 'Narayanganj', 'Gazipur');
    return [
      'local' => $faker->streetAddress,
      'postal_code' => rand(1100, 1956),
      'city' => $city[rand(0,count($city)-1)],
      'country' => 'Bangladesh',
    ];
});
