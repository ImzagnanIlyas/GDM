<?php

namespace App\Http\Controllers\Medecin\Consultation;

use App\Consultation;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NouvelleConsultationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cons = new Consultation();

        $cons->patient_id = $request->input('id');
        $cons->medecin_id = Auth::guard('medecin')->user()->id;
        $cons->date = now();
        $cons->lieu = $request->input('lieu');
        $cons->motif = $request->input('motif');

        $cons->save();

        return redirect()->route('medecin.consultation.showInfo', [ 'id' => Consultation::all()->sortBy('created_at')->last()->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('medecin.consultation.nouvelle-consultation', [
            'patient' => Patient::find($id)
        ]);
    }


}
