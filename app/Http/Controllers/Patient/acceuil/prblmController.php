<?php
namespace App\Http\Controllers\Patient\acceuil;

use App\Http\Controllers\Controller;
use App\Prescription_medicamenteuse;
use Illuminate\Support\Facades\Auth;

class prblmController extends Controller
{
    public function show()
    {
        $patient = Auth::guard('patient')->user();
        $tc = Prescription_medicamenteuse::Join('medicaments', 'medicaments.id', 'prescription_medicamenteuses.medicament_id')
            ->Join('consultations', 'consultations.id', 'prescription_medicamenteuses.consultation_id')
            ->Where('prescription_medicamenteuses.duree', '=', "chronique")
            ->Where('consultations.patient_id', $patient->id)
            ->paginate(5);
        return view('patient.acceuil.prblm', [
            'patient' => $patient,
            'TC' => $tc,
        ]);
    }
}
