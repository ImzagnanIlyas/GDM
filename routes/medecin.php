<?php

Route::group(['namespace' => 'Medecin'], function() {

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('medecin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('medecin.logout');

    // Register
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('medecin.register');
    // Route::post('register', 'Auth\RegisterController@register');

    // // Passwords
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('medecin.password.email');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('medecin.password.request');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('medecin.password.reset');

    // // Must verify email
    // Route::get('email/resend','Auth\VerificationController@resend')->name('medecin.verification.resend');
    // Route::get('email/verify','Auth\VerificationController@show')->name('medecin.verification.notice');
    // Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('medecin.verification.verify');

    Route::get('/', 'HomeController@index')->name('medecin.dashboard');

    Route::get('/rechercher', 'HomeController@recherche')->name('medecin.recherche');
    Route::get('/mon_profil', 'HomeController@profil')->name('medecin.profil');
    Route::get('/mes_consultations', 'HomeController@mesCons')->name('medecin.mesCons');

    //Nouvelle consultation : show & store
    Route::resource('nouvelle-consultation', 'Consultation\NouvelleConsultationController')->only(['show', 'store']);
    //Fast nouvelle consultation :
    Route::get('nouvelle-consultation-searchAlert', 'Consultation\NouvelleConsultationController@showSearchAlert')->name('medecin.showSearchAlert');
    Route::get('nouvelle-consultation-addAlert', 'Consultation\NouvelleConsultationController@showAddAlert')->name('medecin.showAddAlert');

    //Consultation
    Route::prefix('consultation')->group(function () {
        Route::get('informations/{id}', 'Consultation\ConsultationController@showInfo')->name('medecin.consultation.showInfo');
        Route::post('storeInfo/{id}', 'Consultation\ConsultationController@storeInfo')->name('medecin.consultation.storeInfo');
        Route::get('exam_general/{id}', 'Consultation\ConsultationController@showEG')->name('medecin.consultation.showEG');
        Route::post('storeEG/{id}', 'Consultation\ConsultationController@storeEG')->name('medecin.consultation.storeEG');
        Route::post('updateEG/{id}/{c_id}', 'Consultation\ConsultationController@updateEG')->name('medecin.consultation.updateEG');

        Route::get('{consultation_id}/examen-specialise', 'Consultation\ConsultationController@showExamSpecial')->name('medecin.consultation.showExamSpecial');
        Route::get('examen-specialise', 'Consultation\ConsultationController@storeExamSpecial')->name('medecin.consultation.storeExamSpecial');
        Route::get('{consultation_id}/examen-specialise/{examen_id}/resultat/{type}', 'Consultation\ConsultationController@showExamSpecialAjoutResultat')->name('medecin.consultation.showExamSpecialAjoutResultat');
        Route::post('examen-specialise', 'Consultation\ConsultationController@storeFiles')->name('medecin.consultation.ExamSpecial.storeFile');
        Route::get('{consultation_id}/examen-specialise/{examen_id}/resultat', 'Consultation\ConsultationController@showExamSpecialResultat')->name('medecin.consultation.showExamSpecialResultat');
        Route::get('{consultation_id}/examen-specialise/{examen_id}/PDF{i}', 'Consultation\ConsultationController@showExamSpecialResultatPDF')->name('medecin.consultation.ExamSpecialResultat.PDF');

        Route::get('{consultation_id}/ordonnance', 'Consultation\ConsultationController@showOrdonnance')->name('medecin.consultation.showOrdonnance');

        Route::get('{consultation_id}/examen-complementaire', 'Consultation\ConsultationController@showExamCompl')->name('medecin.consultation.showExamCompl');
        Route::get('{consultation_id}/nouveau-examen-complementaire', 'Consultation\ConsultationController@createExamCompl')->name('medecin.consultation.createExamCompl');
        Route::get('{consultation_id}/examen-complementaire/{examen_id}/resultat', 'Consultation\ConsultationController@showExamComplResultat')->name('medecin.consultation.showExamComplResultat');
        Route::get('{consultation_id}/examen-complementaire/{examen_id}/PDF{i}', 'Consultation\ConsultationController@showExamComplResultatPDF')->name('medecin.consultation.ExamComplResultat.PDF');
        Route::get('{consultation_id}/examen-complementaire/{examen_id}/bilan', 'Consultation\ConsultationController@showExamComplBilan')->name('medecin.consultation.showExamComplBilan');

    });

    //Mes patients
    Route::get('/mes-patients', 'HomeController@mesPatients')->name('medecin.mesPatients');
    Route::get('/mes-consultations/{patient_id}', 'HomeController@mesConsultationsPatient')->name('medecin.mesConsultationsPatient');

    Route::get('/dossier_medical/{patient}/ATCD', 'HomeController@dossier_ATCD')->name('medecin.dossier_ATCD');
    Route::get('/dossier_medical/{patient}/Biometrie', 'HomeController@dossier_Biometrie')->name('medecin.dossier_Biometrie');
    Route::get('/dossier_medical/{patient}/CM', 'HomeController@dossier_CM')->name('medecin.dossier_CM');
    Route::get('/dossier_medical/{patient}/Ordonnances', 'HomeController@dossier_Ordonnances')->name('medecin.dossier_Ordonnances');
    Route::get('/dossier_medical/{patient}/Examens', 'HomeController@dossier_Examens')->name('medecin.dossier_Examens');
    Route::get('/dossier_medical/{patient}/Problemes', 'HomeController@dossier_Problemes')->name('medecin.dossier_Problemes');

});
