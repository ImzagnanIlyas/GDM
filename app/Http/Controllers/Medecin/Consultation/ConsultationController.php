<?php

namespace App\Http\Controllers\Medecin\Consultation;

use App\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{

    public function showInfo($id)
    {
        return view('medecin.consultation.consultation-info', [
            'consultation' => Consultation::find($id)
        ]);
    }

    public function showExamSpecial($id)
    {
        return view('medecin.consultation.consultation-examSpecial', [
            'consultation' => Consultation::find($id)
        ]);
    }
}
