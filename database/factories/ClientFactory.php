<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'nomClient' => $faker->name,
        'email' => $faker->safeEmail,
        'contact' => $faker->phoneNumber,
        'adresse' => $faker->address
    ];
});
