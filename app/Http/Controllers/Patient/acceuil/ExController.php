<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Examen_complimentaire;
use App\Consultation;
use App\Examen_general;
use App\Examen_specialise;
use Illuminate\Support\Facades\Auth;



class ExController extends Controller
{
    public function show()
    {
        $patient = Auth::guard('patient')->user();
        $consultations =  Consultation::select('id')->where('patient_id',$patient->id)->get()->toArray();

        $examen = Examen_complimentaire::select('*')->whereIn('consultation_id' , array_values( $consultations))->orderByDesc('created_at')->paginate(4);
        return view('patient.acceuil.Ex' , [
                    'patient'=>$patient,
                    'examen' => $examen ,
                    'consultations'=>$consultations ,
        ]);
    }

    public function showEG($id)
    {
        $patient = Auth::guard('patient')->user();
        $id=Examen_general::findOrFail($id);
        return view('patient.acceuil.ExamenGeneral' ,compact('id') , [
            'examen' => $id ,
            'consultation'=> $id->consultation ,
            'id'=>$id,
            'patient'=>$patient
        ]);
    }

    public function showES($id)
    {
        $patient = Auth::guard('patient')->user();
        $consultations =  Consultation::select('id')
        ->where('patient_id',$patient->id)->get()->toArray();
        $examenspecialise = Examen_specialise::select('*')
        ->whereIn('consultation_id' , array_values( $consultations))->get();
        $id=Examen_specialise::find($id);
        return view('patient.acceuil.ExamenSpecilaise' , compact('id') , [
            'examenspecialise' => $examenspecialise ,
            'consultations'=>$consultations ,
            'consultation'=> $id->consultation ,
            'id'=>$id ,
            'patient'=>$patient
        ]);
    }

    public function showExamenS($id)
    {
        $patient = Auth::guard('patient')->user();
        $consultation = Consultation::findOrFail($id);
        return view('patient.acceuil.Examenspe' , [
            'examen' => $consultation->ESs ,
            'consultation'=>$consultation ,
            'patient'=> $patient
        ]);
    }

}
