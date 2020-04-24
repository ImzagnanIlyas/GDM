<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BioController extends Controller
{
    public function show()
    {

        $idp = Auth::guard('patient')->user()->id;
        $patient = Patient::leftJoin('consultations' , 'consultations.patient_id' , 'patients.id')
        ->select('consultations.date' , 'patients.biometrie')
        ->orderby('consultations.date')
        ->where('patient_id', $idp && 'patients.consultation_id' , 'consultations.id')->get();
               $data['patient'] = $patient;
               return view('patient.acceuil.Bio' , [

                'patient'=>$patient
                 ]

            );


    }
}
