<?php
namespace App\Http\Controllers\Patient\acceuil;

use App\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdController extends Controller
{
    public function show()
    {

        $patient = Auth::guard('patient')->user();

        return view('patient.acceuil.Ord', [
            'patient' => $patient,
            'consultations' => Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->orderByDesc('created_at')->paginate(4)
        ]);
    }

    public function showTxt($consultation_id)
    {
        $patient = Auth::guard('patient')->user();

        return view('patient.acceuil.ordonnance-text', [
            'patient' => $patient,
            'consultation' => Consultation::findOrFail($consultation_id)
        ]);
    }
}
