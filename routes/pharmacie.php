<?php

Route::group(['namespace' => 'Pharmacie'], function() {
    Route::get('/', 'HomeController@index')->name('pharmacie.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('pharmacie.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('pharmacie.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('pharmacie.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('pharmacie.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('pharmacie.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('pharmacie.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('pharmacie.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('pharmacie.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('pharmacie.verification.verify');

});