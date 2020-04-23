<?php

namespace App\Http\Controllers\Medecin;

use App\Consultation;
use App\Http\Controllers\Controller;
use App\Patient;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{

    protected $redirectTo = '/medecin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }

    /**
     * Show the Medecin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('medecin.home');
    }

    public function recherche(Request $request)
    {
        $cin = $request->cin;
        return view('medecin.liste_patients', [
            'patient' => Patient::where('cin', $request->cin)->first(), 'cin' => $cin
        ]);
    }


    public function consult_med()
    {
        return view('medecin.consult_med');
    }

    public function dossier_ATCD($id)
    {
        return view('medecin.dossier_ATCD', [
            'patient' => Patient::find($id)
        ]);
    }

    public function dossier_Biometrie($id)
    {
        return view('medecin.dossier_Biometrie', [
            'patient' => Patient::find($id)
        ]);
    }

    public function dossier_CM($id)
    {
        return view('medecin.dossier_CM', [
            'patient' => Patient::find($id)
        ]);
    }

    public function dossier_Ordonnances($id)
    {
        return view('medecin.dossier_Ordonnances', [
            'patient' => Patient::find($id)
        ]);
    }

    public function dossier_Examens($id)
    {
        return view('medecin.dossier_Examens', [
            'patient' => Patient::find($id)
        ]);
    }

    public function dossier_Problemes($id)
    {
        return view('medecin.dossier_Problemes', [
            'patient' => Patient::find($id)
        ]);
    }

    public function profil()
    {
        return view('medecin.profil');
    }

    public function mesCons()
    {
        return view('medecin.mesCons');
    }

    public function mesPatients()
    {
        return view('medecin.mes-patients');
    }

    public function mesConsultationsPatient($patient_id)
    {
        return view('medecin.mes-consultations-patient',[
            'patient' => Patient::findOrFail(Crypt::decrypt($patient_id)),
        ]);
    }
}
