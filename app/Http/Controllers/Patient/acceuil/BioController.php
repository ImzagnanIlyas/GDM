<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Consultation;
use App\Examen_general;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BioController extends Controller
{
    public function show()
    {

        $patient = Auth::guard('patient')->user();
        $EG= Examen_general::join('consultations', 'consultations.id' , 'examen_generals.consultation_id')
        ->where('consultations.patient_id' , $patient->id)
        ->paginate(5);

               return view('patient.acceuil.Bio' , [
                'patient'=>$patient,
                'EG'=>$EG
                 ]

            );


    }
}
