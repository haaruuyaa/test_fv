<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Drivers::class, function (Faker $faker) {
    return [
        'name' => $faker->name('male'),
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->randomElement(['fvdrive@gmail.com','fvtaxi@gmail.com',$faker->safeEmail])
    ];
});
