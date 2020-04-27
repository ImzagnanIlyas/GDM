<?php

namespace App\Http\Controllers\Medecin\Dossier;

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


        return view('medecin.dossier.Biometrie', [
            'patient' => $patient,
            'biometrie' => $biometrie,
            'vitaux' => $EG
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
