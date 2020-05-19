<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Examen_general;
use Illuminate\Support\Facades\Auth;
use App\Consultation;

class BioController extends Controller
{
    public function index()
    {
        $patient = Auth::guard('patient')->user();
        $EG = Examen_general::
                join('consultations' , 'consultations.id' , 'examen_generals.consultation_id')
                ->where('consultations.patient_id', $patient->id)
                ->orderByDesc('examen_generals.created_at')
                ->paginate(4);
        return view('patient.acceuil.Bio', [
            'patient' => $patient,
            'vitaux' => $EG



        ]);

    }



}
