<?php

Route::group(['namespace' => 'Medecin'], function() {

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('medecin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('medecin.logout');

    Route::get('/', 'HomeController@index')->name('medecin.dashboard');

    Route::get('/rechercher', 'HomeController@recherche')->name('medecin.recherche');
    Route::get('/mon_profil', 'HomeController@profil')->name('medecin.profil');
    Route::get('/mes_consultations', 'HomeController@mesCons')->name('medecin.mesCons');
    Route::get('/medicaments', 'HomeController@medicaments')->name('medecin.medicaments');

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

    //Dossier
    Route::prefix('dossier')->group(function () {
        Route::get('{patient_id}/ATCD/{n}', 'Dossier\DossierController@ATCD')->name('medecin.dossier.ATCD');
        Route::get('{patient_id}/Biometrie', 'Dossier\DossierController@Biometrie')->name('medecin.dossier.Biometrie');
        Route::get('{patient_id}/CM', 'Dossier\DossierController@CM')->name('medecin.dossier.CM');
        Route::get('{patient_id}/Ordonnances', 'Dossier\DossierController@Ordonnances')->name('medecin.dossier.Ordonnances');
        Route::get('{patient_id}/Examens', 'Dossier\DossierController@Examens')->name('medecin.dossier.Examens');
        Route::get('{patient_id}/Problemes', 'Dossier\DossierController@Problemes')->name('medecin.dossier.Problemes');
    });

});
