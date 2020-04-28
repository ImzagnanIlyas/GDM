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
        if ($n == 1) {
            $data = Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
                            ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                            ->Where([
                                ['consultations.patient_id' , $decrypted],
                                ['confirmation' , true]
                                ])
                            ->orderByDesc('prescription_medicamenteuses.created_at')
                            ->paginate(5);
        }elseif ($n == 2) {
            $atcd = json_decode($patient->atcd);
            $data = $atcd->habitudes;
            usort($data, function($a, $b) {
                return $b->date <=> $a->date;
            });
        }elseif ($n == 3) {
            $atcd = json_decode($patient->atcd);
            $data = $atcd->chirurgicaux;
            usort($data, function($a, $b) {
                return $b->date_operation <=> $a->date_operation;
            });
        }

        return view('medecin.dossier.ATCD', [
            'patient' => $patient, 'n' => $n, 'data' => $data
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
        $biometrie = json_decode($patient->biometrie);
        $EG = Examen_general::
                join('consultations' , 'consultations.id' , 'examen_generals.consultation_id')
                ->where('consultations.patient_id', $patient->id)
                ->orderByDesc('examen_generals.created_at')
                ->paginate(5);


        return view('medecin.dossier.biometrie', [
            'patient' => $patient,
            'biometrie' => $biometrie,
            'vitaux' => $EG
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
            'patient' => $patient,
            'consultations' => Consultation::where('patient_id', $patient->id)->orderByDesc('created_at')->paginate(5)
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
            'patient' => $patient,
            'consultations' => Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->orderByDesc('created_at')->paginate(5)
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
        $EC = $EG = Examen_complimentaire::
                join('consultations' , 'consultations.id' , 'examen_complimentaires.consultation_id')
                ->select('examen_complimentaires.*')
                ->where('consultations.patient_id', $patient->id)
                ->orderByDesc('examen_complimentaires.created_at')
                ->paginate(4);

        return view('medecin.dossier.examens', [
            'patient' => $patient,
            'examens' => $EC
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
