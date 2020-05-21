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
        $consultations =  Consultation::select('id')->where('patient_id',$patient->id)->get()->toArray();
        $EG = Examen_general::select('*')
                ->whereIn('consultation_id' , array_values( $consultations))
                ->orderByDesc('examen_generals.created_at')
                ->paginate(4);
        return view('patient.acceuil.Bio', [
            'patient' => $patient,
            'vitaux' => $EG



        ]);

    }



}
