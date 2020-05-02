<?php

Route::group(['namespace' => 'Patient'], function() {
    Route::get('/', 'HomeController@index')->name('patient.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('patient.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('patient.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('patient.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('patient.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('patient.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('patient.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('patient.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('patient.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('patient.verification.verify');


    Route::get('ATCD','acceuil\acceuilController@show')->name('ATCD')->middleware('patient.auth');
    Route::get('Bio','acceuil\BioController@show')->name('Bio')->middleware('patient.auth');
    Route::get('mescon','acceuil\mesconController@index')->name('mescon')->middleware('patient.auth');
    Route::get('detail/{id}','acceuil\mesconController@show')->name('detail')->middleware('patient.auth');
    Route::get('Ord/{id}','acceuil\OrdController@show')->name('Ord')->middleware('patient.auth');
    Route::get('Ex','acceuil\ExController@show')->name('Ex')->middleware('patient.auth');
    Route::get('Examengeneral/{id}','acceuil\ExController@showEG')->name('Examengeneral')->middleware('patient.auth');
    Route::get('Examenspecialise/{id}','acceuil\ExController@showES')->name('Examenspecialise')->middleware('patient.auth');
    Route::get('Examenspe','acceuil\ExController@showExamenS')->name('Examenspe')->middleware('patient.auth');
    Route::get('prblm','acceuil\prblmController@show')->name('prblm')->middleware('patient.auth');
    Route::get('profile','acceuil\profileController@show')->name('profile')->middleware('patient.auth');
    Route::get('CM','acceuil\CMController@show')->name('CM')->middleware('patient.auth');
    Route::get('Resultat/{id}' ,'acceuil\resultatController@show')->name('Resultat')->middleware('patient.auth');
    Route::get('Bilan/{id}' ,'acceuil\resultatController@showBilan')->name('Bilan')->middleware('patient.auth');
    Route::get('search', 'acceuil\mesconController@search')->name('search');

});




