<?php

use Faker\Generator as Faker;

$factory->define(App\Medicament::class, function (Faker $faker) {
    return [
        'nomMedoc' => $faker->firstName,
        'famille' => $faker->lastName,
        'prixVente' => mt_rand(150, 750)
    ];
});
