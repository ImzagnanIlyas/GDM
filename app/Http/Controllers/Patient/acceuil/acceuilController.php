<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Prescription_medicamenteuse;
use Illuminate\Support\Facades\Auth;


class acceuilController extends Controller
{
    public function show()
    {
        $patient = Auth::guard('patient')->user();
        $pres= Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
            ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
            ->Where('consultations.patient_id' , $patient->id)->paginate(5);
        return view('patient.acceuil.ATCD' , [
            'pres' => $pres , 'patient'=>$patient
            ]);
    }

    public function ATCD($block)
    {

        $patient = Auth::guard('patient')->user();
        if ($block === "médicaments") {
            $data = Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
                            ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                            ->Where([
                                ['consultations.patient_id' , $patient->id],
                                ['confirmation' , true]
                                ])
                            ->orderByDesc('prescription_medicamenteuses.created_at')
                            ->paginate(4);
        }elseif ($block === "habitudes") {
            $atcd = json_decode($patient->atcd);
            $data = $atcd->habitudes;
            usort($data, function($a, $b) {
                return $b->date <=> $a->date;
            });
        }elseif ($block === "chirurgicaux") {
            $atcd = json_decode($patient->atcd);
            $data = $atcd->chirurgicaux;
            usort($data, function($a, $b) {
                return $b->date_operation <=> $a->date_operation;
            });
        }

        return view('patient.acceuil.ATCD', [
            'patient' => $patient, 'block' => $block, 'data' => $data
        ]);
    }
}

