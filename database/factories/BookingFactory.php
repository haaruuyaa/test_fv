<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Booking::class, function (Faker $faker) {
    return [
        'created_at_local' => $faker->dateTime,
        'driver_id' => $faker->numberBetween(1,10),
        'passenger_id' => $faker->numberBetween(100,150),
        'state' => $faker->randomElement(['COMPLETED','CANCELLED_PASSENGER','CANCELLED_DRIVER']),
        'country_id' => $faker->numberBetween(1,5),
        'fare' => $faker->randomNumber(2),
    ];
});
