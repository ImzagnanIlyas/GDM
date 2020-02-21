<?php

use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Voyager admin :
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'superadmin',
            'email' => 'superadmin',
            'password' => Hash::make('superadmin'),
        ]);

        //Patient :
        DB::table('patients')->insert([
            'cin' => 'AA000000',
            'nom' => 'patient',
            'prenom' => 'patient',
            'ddn' => date("Y-m-d"),
            'sexe' => 'H',
            'adresse' => 'Patens cognomentum porrigitur gentibus modum Saracenis occupatam plagam rex Nili',
            'telephone' => '0600000000',
            'profession' => 'Lorem ipsum',
            'etat_civil' => 'Célibataire',
            'famille' => '{}',
            'atcd' => '{}',
            'username' => 'patient',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        //Medecin :
        DB::table('medecins')->insert([
            'patient_id' => 1,
            'inpe' => 123456789,
            'specialite' => 'X',
            'type' => 'X',
            'tele_pro' => '0612345678',
            'lieu' => 'X',
            'username' => 'medecin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        //Pharmacie :
        DB::table('pharmacies')->insert([
            'inpe' => 555555555,
            'nom' => 'pharmacie',
            'adresse' => 'X',
            'tele' => '0655555555',
            'patient_id' => 1,
            'username' => 'pharmacie',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        //Examinateur :
        DB::table('examinateurs')->insert([
            'inpe' => 999999999,
            'nom' => 'examinateur',
            'adresse' => 'X',
            'tele' => '0699999999',
            'patient_id' => 1,
            'username' => 'examinateur',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

    }
}
