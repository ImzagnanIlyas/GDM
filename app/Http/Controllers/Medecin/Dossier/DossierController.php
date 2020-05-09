<?php

namespace App\Http\Controllers\Medecin\Dossier;

use App\Consultation;
use App\Examen_complimentaire;
use App\Examen_general;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Prescription_medicamenteuse;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

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

    public function ATCD($patient_id, $n)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find($decrypted);

        return view('medecin.dossier.ATCD', [
            'patient' => $patient, 'n' => $n
        ]);
    }

    public function Biometrie($patient_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find($decrypted);

        return view('medecin.dossier.biometrie', [
            'patient' => $patient
        ]);
    }

    public function CM($patient_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find($decrypted);
        return view('medecin.dossier.CM', [
            'patient' => $patient
        ]);
    }

    public function Ordonnances($patient_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find($decrypted);
        return view('medecin.dossier.ordonnances', [
            'patient' => $patient
        ]);
    }

    public function showOrdonnance($patient_id, $consultation_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
            $decrypted = Crypt::decrypt($consultation_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        return view('medecin.dossier.ordonnance-details', [
            'patient' => Patient::findOrFail(Crypt::decrypt($patient_id)),
            'consultation' => Consultation::findOrFail($decrypted)
        ]);
    }

    public function Examens($patient_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find($decrypted);

        return view('medecin.dossier.examens', [
            'patient' => $patient
        ]);
    }

    public function showExamen($patient_id, $examen_id){
        try {
            $decrypted = Crypt::decrypt($patient_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find(Crypt::decrypt($patient_id));
        return view('medecin.dossier.examen-details', [
            'patient' => $patient,
            'examen' => Examen_complimentaire::findOrFail(Crypt::decrypt($examen_id))
        ]);
    }

    public function Problemes($patient_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $patient = Patient::find(Crypt::decrypt($patient_id));

        $atcd = json_decode($patient->atcd);
        $allergies = $atcd->allergie;

        $TC = Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
            ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
            ->Where([
                ['consultations.patient_id' , $decrypted],
                ['confirmation' , true],
                ['duree', 'chronique']
                ])
            ->orderByDesc('prescription_medicamenteuses.created_at')
            ->paginate(5);
        return view('medecin.dossier.problemes', [
            'patient' => $patient,
            'allergies' => $allergies,
            'TC' => $TC
        ]);
    }

}
