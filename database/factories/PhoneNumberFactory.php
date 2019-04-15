<?php

use Faker\Generator as Faker;
use App\Models\Other\PhoneNumber;

$factory->define(PhoneNumber::class, function (Faker $faker) {
    return [
      'number' => $faker->e164PhoneNumber,
    ];
});
