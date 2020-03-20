<?php

use App\Patient;
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

$factory->define(App\Medecin::class, function () {
    // Faker
    $faker = Faker::create('fr_FR');

    return [
        'patient_id' => rand(1,Patient::all()->count()),
        'inpe' => $faker->unique()->randomNumber($nbDigits = 9),
        'specialite' => 'X',
        'type' => 'X',
        'tele_pro' => '0'.rand(6,7).$faker->unique()->randomNumber($nbDigits = 8),
        'lieu' => 'X',
        'username' => 'medecin',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
