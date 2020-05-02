<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Examen_general;
use Illuminate\Support\Facades\Auth;


class BioController extends Controller
{
    public function show()
    {
        $patient = Auth::guard('patient')->user();
        $biometrie = json_decode($patient->biometrie);
        $EG = Examen_general::
                join('consultations' , 'consultations.id' , 'examen_generals.consultation_id')
                ->where('consultations.patient_id', $patient->id)
                ->orderByDesc('examen_generals.created_at')
                ->paginate(5);


        return view('patient.acceuil.Bio', [
            'patient' => $patient,
            'biometrie' => $biometrie,
            'vitaux' => $EG
        ]);

    }
}
