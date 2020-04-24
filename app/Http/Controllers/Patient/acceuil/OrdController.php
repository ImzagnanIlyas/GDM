<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Consultation;
use App\Medicament;
use App\Prescription_medicamenteuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class OrdController extends Controller
{
    public function show($id)
    {
        $patient = Auth::guard('patient')->user();
 $consultations =  Consultation::select('id')
 ->where('patient_id',$patient->id)
 ->get()
 ->toArray();


$id=Consultation::find($id);

                   return view('patient.acceuil.Ord' , compact('id') , [
                    
                    'consultations'=>$consultations ,
                    'id'=>$id

                ]

            );

        }
}
