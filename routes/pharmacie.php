<?php

use App\Patient;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

Route::group(['namespace' => 'Pharmacie'], function() {
    Route::get('/', 'HomeController@index')->name('pharmacie.accueil');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('pharmacie.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('pharmacie.logout');

    // // Register
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('pharmacie.register');
    // Route::post('register', 'Auth\RegisterController@register');

    // // Passwords
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('pharmacie.password.email');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('pharmacie.password.request');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('pharmacie.password.reset');

    // // Must verify email
    // Route::get('email/resend','Auth\VerificationController@resend')->name('pharmacie.verification.resend');
    // Route::get('email/verify','Auth\VerificationController@show')->name('pharmacie.verification.notice');
    // Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('pharmacie.verification.verify');

    Route::get('layout', function () {
        return view('pharmacie.layouts.pharmacie');
    });

    Route::get('recherche', function () {
        return view('pharmacie.recherche');
    })->name('pharmacie.recherche');

    Route::get('ordonnance/{id}', function ($id) {

        try {
            $decrypted = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        return view('pharmacie.ordonnance',[
            'patient' => Patient::findOrFail($decrypted)
        ]);
    })->name('pharmacie.ordonnance');

    Route::get('profil', function () {
        return view('pharmacie.profil');
    })->name('pharmacie.profil');

    Route::get('mdp', function () {
        return view('pharmacie.mdp');
    })->name('pharmacie.mdp');

    Route::get('historique', function () {
        return view('pharmacie.historique');
    })
    ->name('pharmacie.historique')
    ->middleware('pharmacie.auth');
});
