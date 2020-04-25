<?php

namespace App\Http\Controllers\Medecin\Dossier;

use App\Http\Controllers\Controller;
use App\Patient;
use App\Prescription_medicamenteuse;

class DossierController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }

    public function ATCD($id, $n)
    {
        $prescriptions = Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
        ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
        ->Where('consultations.patient_id' , $id)->get();
        return view('medecin.dossier.ATCD', [
            'patient' => Patient::find($id), 'n' => $n, 'prescriptions' => $prescriptions
        ]);
    }

    public function Biometrie($id)
    {
        return view('medecin.dossier.Biometrie', [
            'patient' => Patient::find($id)
        ]);
    }

    public function CM($id)
    {
        return view('medecin.dossier.CM', [
            'patient' => Patient::find($id)
        ]);
    }

    public function Ordonnances($id)
    {
        return view('medecin.dossier.Ordonnances', [
            'patient' => Patient::find($id)
        ]);
    }

    public function Examens($id)
    {
        return view('medecin.dossier.Examens', [
            'patient' => Patient::find($id)
        ]);
    }

    public function Problemes($id)
    {
        return view('medecin.dossier.Problemes', [
            'patient' => Patient::find($id)
        ]);
    }

}
