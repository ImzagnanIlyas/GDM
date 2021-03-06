<?php

Route::group(['namespace' => 'Examinateur'], function() {
    Route::get('/', 'HomeController@index')->name('examinateur.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('examinateur.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('examinateur.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('examinateur.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('examinateur.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('examinateur.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('examinateur.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('examinateur.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('examinateur.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('examinateur.verification.verify');

});