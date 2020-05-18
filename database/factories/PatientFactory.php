<?php

use Illuminate\Support\Str;
// use Faker\Generator as Faker;
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

// $factory->define(App\Patient::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => bcrypt('password'),
//         'remember_token' => Str::random(10)
//     ];
// });

$factory->define(App\Patient::class, function () {
    // Faker
    $faker = Faker::create('fr_FR');

    // Sexe
    $sexe = $faker->randomElement(['Homme', 'Femme']);
    if ($sexe === "Homme") {
        $gender = "male";
    }else {
        $gender = "female";
    }
    // Nom & Prenom
    $nom = $faker->lastName;
    $prenom = $faker->firstName($gender);
    $username = strtoupper($nom.'-'.$prenom);
    // Groupe sanguins
    $GS = $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);

    return [
        'cin' => chr(rand(65,90)).chr(rand(65,90)).$faker->unique()->randomNumber($nbDigits = 6),
        'nom' => strtoupper($nom),
        'prenom' => $prenom,
        'ddn' => $faker->dateTime->format('Y-m-d'),
        'sexe' => $sexe,
        'adresse' => $faker->address,
        'telephone' => '0'.rand(6,7).$faker->unique()->randomNumber($nbDigits = 8),
        'profession' => $faker->jobTitle,
        'etat_civil' => $faker->randomElement(['Marié','Célibataire']),
        'famille' => '{}',
        'biometrie' => "{\"vitaux\": [], \"grp_sanguin\": \"$GS\"}",
        'atcd' => '{"habitudes":[],"chirurgicaux":[],"go":{"Menarches":"","Menopause":"","Cycle":"","Gestation":"","Fausses_couches":"","Autre":[]},"allergie":[]}',
        'username' => $username,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
