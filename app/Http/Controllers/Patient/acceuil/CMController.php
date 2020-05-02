<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Consultation;
use App\Examen_specialise;
use Illuminate\Support\Facades\Auth;


class CMController extends Controller
{
    public function show()
    {
        $patient = Auth::guard('patient')->user();
        $consultations =  Consultation::where('patient_id',$patient->id)->get();
        $examen =  Examen_specialise::leftJoin('consultations' , 'consultations.id' , 'examen_specialises.consultation_id' )->get();

        return view('patient.acceuil.CM' , [
            'patient'=>$patient,
            'consultations' => $consultations,
            'examen'=>$examen

        ]);
    }
}

