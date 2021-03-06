<?php

use Faker\Generator as Faker;

$factory->define(App\Fournisseur::class, function (Faker $faker) {
    return [
        'nomFournisseur' => $faker->name,
        'contact' => $faker->phoneNumber,
        'email' => $faker->email,
        'adresse' => $faker->address
    ];
});
