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
        $examen = Examen_complimentaire::find($id);

        return view('patient.acceuil.Resultat', compact('id'), [
            'examen' => $examen,
            'consultation' => $examen->consultation,
            'patient' => $patient,
        ]);
    }

    public function showBilan($id)
    {
        $patient = Auth::guard('patient')->user();
        $examen = Examen_complimentaire::find($id);
        return view('patient.acceuil.bilan', compact('id'), [
            'examen' => $examen,
            'consultation' => $examen->consultation,
            'patient' => $patient,
        ]);
    }

    public function showPDF($id, $i)
    {
        $examen = Examen_complimentaire::findOrFail($id);
        $resultat = json_decode($examen->resultat);
        return response()->file( public_path('storage/'.$resultat->pdf[$i-1]) );
    }
}
