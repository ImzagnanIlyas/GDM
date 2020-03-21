<?php

Route::group(['namespace' => 'Medecin'], function() {
    Route::get('/', 'HomeController@index')->name('medecin.dashboard');

    Route::get('/rechercher', 'HomeController@recherche')->name('medecin.recherche');

    Route::get('/{patient}/nouv_cons', 'HomeController@nouv_cons')->name('medecin.nouv_cons');
    Route::get('/{patient}/enrg_cons', 'HomeController@enrg_cons')->name('medecin.enrg_cons');
    Route::get('/{patient}/consult_med', 'HomeController@consult_med')->name('medecin.consult_med');

    Route::get('/dossier_medical/{patient}/ATCD', 'HomeController@dossier_ATCD')->name('medecin.dossier_ATCD');
    Route::get('/dossier_medical/{patient}/Biometrie', 'HomeController@dossier_Biometrie')->name('medecin.dossier_Biometrie');
    Route::get('/dossier_medical/{patient}/CM', 'HomeController@dossier_CM')->name('medecin.dossier_CM');
    Route::get('/dossier_medical/{patient}/Ordonnances', 'HomeController@dossier_Ordonnances')->name('medecin.dossier_Ordonnances');
    Route::get('/dossier_medical/{patient}/Examens', 'HomeController@dossier_Examens')->name('medecin.dossier_Examens');
    Route::get('/dossier_medical/{patient}/Problemes', 'HomeController@dossier_Problemes')->name('medecin.dossier_Problemes');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('medecin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('medecin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('medecin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('medecin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('medecin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('medecin.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('medecin.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('medecin.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('medecin.verification.verify');

    //Test
});
