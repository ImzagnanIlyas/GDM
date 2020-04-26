<?php

use App\Examen_complimentaire;
use Illuminate\Support\Facades\Auth;

Route::group(['namespace' => 'Examinateur'], function() {
    Route::get('/', 'HomeController@index')->name('examinateur.accueil');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('examinateur.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('examinateur.logout');

    // // Register
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('examinateur.register');
    // Route::post('register', 'Auth\RegisterController@register');

    // // Passwords
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('examinateur.password.email');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('examinateur.password.request');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('examinateur.password.reset');

    // // Must verify email
    // Route::get('email/resend','Auth\VerificationController@resend')->name('examinateur.verification.resend');
    // Route::get('email/verify','Auth\VerificationController@show')->name('examinateur.verification.notice');
    // Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('examinateur.verification.verify');

    Route::get('layout', function () {
        return view('examinateur.layouts.examinateur');
    });

    Route::get('profil', function () {
        return view('examinateur.profil');
    })
    ->name('examinateur.profil')
    ->middleware('examinateur.auth');

    Route::get('mdp', function () {
        return view('examinateur.mdp');
    })
    ->name('examinateur.mdp')
    ->middleware('examinateur.auth');

    Route::get('historique', function () {
        return view('examinateur.historique');
    })
    ->name('examinateur.historique')
    ->middleware('examinateur.auth');

    Route::get('examens/{patient_id}', 'ExamensController@showExams')->name('examinateur.showExams');
    Route::get('examens/{examen_id}/bilan', 'ExamensController@showExamsBilan')->name('examinateur.showExamslBilan');
    Route::get('examens/{examen_id}/resultat/{type}', 'ExamensController@showExamsAjoutResultat')->name('examinateur.showExamsAjoutResultat');
    Route::post('examens-storage', 'ExamensController@storeFiles')->name('examinateur.Exams.storeFile');
    Route::get('examens/{examen_id}/resultat', 'ExamensController@showExamsResultat')->name('examinateur.showExamsResultat');
    Route::get('examens/{examen_id}/PDF{i}', 'ExamensController@showExamsResultatPDF')->name('examinateur.ExamsResultat.PDF');
});
