<?php

Route::group(['namespace' => 'Medecin'], function() {
    Route::get('/', 'HomeController@index')->name('medecin.dashboard');

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

});