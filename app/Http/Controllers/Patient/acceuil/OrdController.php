<?php
namespace App\Http\Controllers\Patient\acceuil;

use App\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdController extends Controller
{
    public function show($id)
    {
        $patient = Auth::guard('patient')->user();
        $consultations = Consultation::select('id')
            ->where('patient_id', $patient->id)
            ->get()
            ->toArray();

        $id = Consultation::find($id);

        return view('patient.acceuil.Ord', compact('id'), [
            'patient' => $patient,
            'consultations' => $consultations,
            'id' => $id,
        ]);
    }
}
