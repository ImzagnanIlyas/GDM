<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
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
        if(!empty($request->cin))
        {
            return view('medecin.liste_patients', [
                'patient' => Patient::where('cin', $request->cin)->first(), 'cin' => $request->cin
            ]);
        }else
        {
            return view('medecin.liste_patients', [
                'patient' => null, 'cin' => $request->cin
            ]);
        }

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

    public function medicaments()
    {
        return view('medecin.medicaments');
    }
}
