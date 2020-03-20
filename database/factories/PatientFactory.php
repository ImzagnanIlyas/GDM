<?php

use Illuminate\Support\Str;
use Faker\Factory as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Patient::class, function () {
    // Faker
    $faker = Faker::create('fr_FR');

    // sexe random
    $sexe = $faker->randomElement(['Mâle', 'Femelle']);
    if ($sexe === "Mâle") {
        $gender = "male";
    }else {
        $gender = "female";
    }

    return [
        'cin' => chr(rand(65,90)).chr(rand(65,90)).$faker->unique()->randomNumber($nbDigits = 6),
        'nom' => $faker->lastName,
        'prenom' => $faker->firstName($gender),
        'ddn' => $faker->dateTime->format('Y-m-d'),
        'sexe' => $sexe,
        'adresse' => $faker->address,
        'telephone' => '0'.rand(6,7).$faker->unique()->randomNumber($nbDigits = 8),
        'profession' => $faker->jobTitle,
        'etat_civil' => $faker->randomElement(['Marié','Célibataire']),
        'famille' => '{}',
        'biometrie' => '{}',
        'atcd' => '{}',
        'username' => $faker->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
