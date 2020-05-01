<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Examen_complimentaire;
use App\Examen_generals;
use App\User;
use App\Patient;
use App\Consultation;
use App\Examen_general;
use App\Examen_specialise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ExController extends Controller
{
    public function show()
    {

        $patient = Auth::guard('patient')->user();
 $consultations =  Consultation::select('id')
 ->where('patient_id',$patient->id)
 ->get()
 ->toArray();

$examen = Examen_complimentaire::select('*')
                   ->whereIn('consultation_id' , array_values( $consultations))
                   ->get();


                   return view('patient.acceuil.Ex' , [
                       'patient'=>$patient,
                    'examen' => $examen ,
                    'consultations'=>$consultations ,


                ]

            );


    }
    public function showEG($id){
$patient = Auth::guard('patient')->user();
 $consultations =  Consultation::select('id')
 ->where('patient_id',$patient->id)
 ->get()
 ->toArray();
        $examenGeneral = Examen_general::select('*')
                   ->whereIn('consultation_id' , array_values( $consultations))
                   ->get();
                   $id=Examen_general::find($id);

                   return view('patient.acceuil.ExamenGeneral' ,compact('id') , [
                    'examen' => $examenGeneral ,
                    'consultations'=>$consultations ,
                    'id'=>$id,
                    'patient'=>$patient


                ]

            );

    }
    public function showES($id)
    {

 $patient = Auth::guard('patient')->user();
 $consultations =  Consultation::select('id')
 ->where('patient_id',$patient->id)
 ->get()
 ->toArray();

$examenspecialise = Examen_specialise::select('*')
                   ->whereIn('consultation_id' , array_values( $consultations))
                   ->get();
$id=Examen_specialise::find($id);

                   return view('patient.acceuil.ExamenSpecilaise' , compact('id') , [
                    'examenspecialise' => $examenspecialise ,
                    'consultations'=>$consultations ,
                    'id'=>$id ,
                    'patient'=>$patient

                ]

            );
 }
}
