<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Consultation;
use App\Medicament;
use App\Prescription_medicamenteuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class prblmController extends Controller
{
    public function show()
    {
        $patient = Auth::guard('patient')->user();
        return view('patient.acceuil.prblm' , [

            'patient'=>$patient
             ]

        );

} }
