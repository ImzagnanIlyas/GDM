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
            'type' => 'admin',
        ]);

        // //Patient :
        // DB::table('patients')->insert([
        //     'cin' => 'AA000000',
        //     'nom' => 'patient',
        //     'nom' => 'patient',
        //     'ddn' => date("Y-m-d"),
        //     'sexe' => 'H',
        //     'adresse' => 'Patens cognomentum porrigitur gentibus modum Saracenis occupatam plagam rex Nili',    
        //     'telephone' => '0600000000',
        //     'profession' => 'Lorem ipsum',
        //     'etat_civil' => 'célibataire',
        //     'famille' => '{}',
        //     'atcd' => '{}',
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'patient',
        //     'email' => 'AA000000',
        //     'password' => Hash::make('patient'),
        //     'type' => 'admin',
        // ]);

    }
}
