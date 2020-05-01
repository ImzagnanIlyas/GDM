<?php
namespace App\Http\Controllers\Patient\acceuil;

use App\Consultation;
use App\Examen_complimentaire;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class resultatController extends Controller
{
    public function show($id)
    {
        $patient = Auth::guard('patient')->user();
        $consultations = Consultation::select('id')
            ->where('patient_id', $patient->id)
            ->get()
            ->toArray();
        $examen = Examen_complimentaire::select('*')
            ->whereIn('consultation_id', array_values($consultations))
            ->get();
        $id = Examen_complimentaire::find($id);

        return view('patient.acceuil.Resultat', compact('id'), [
            'examen' => $examen,
            'consultations' => $consultations,
            'id' => $id,
            'patient' => $patient,
        ]);
    }

    public function showBilan($id)
    {
        $patient = Auth::guard('patient')->user();
        $consultations = Consultation::select('id')
            ->where('patient_id', $patient->id)
            ->get()
            ->toArray();
        $examen = Examen_complimentaire::select('*')
            ->whereIn('consultation_id', array_values($consultations))
            ->get();
        $id = Examen_complimentaire::find($id);
        return view('patient.acceuil.bilan', compact('id'), [
            'examen' => $examen,
            'consultations' => $consultations,
            'id' => $id,
            'patient' => $patient,
        ]);
    }
}
