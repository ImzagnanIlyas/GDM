<?php

namespace App\Http\Controllers\Medecin\Consultation;

use App\Consultation;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

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
        toast('Consultation créée avec succès','success');
        $id = Consultation::all()->where('medecin_id',Auth::guard('medecin')->user()->id)->sortBy('created_at')->last()->id;
        return redirect()->route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($id) ]);
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

    public function showSearchAlert(){
        $route = route('medecin.showAddAlert');
        Alert::html(
        '<h3>Rechercher un patient</h3>',
        "
        <form class='custom-form'  method='GET' action='$route'>
            <div class='form-group'>
                <input type='text' class='form-control' id='cin' name='cin' placeholder='Saisir le CIN complet' required>
            </div>
            <button type='submit' class='btn btn-primary btn-lg btn-block'>Rechercher</button>
        </form>
        "
        )
        ->persistent(false,true)
        ->autoClose(null);

        return redirect()->route('medecin.dashboard');
    }

    public function showAddAlert(Request $request){
        $token = csrf_field();
        try{
            $patient = Patient::where('cin', '=', $request->input('cin'))->firstOrFail();
            $nom = strtoupper($patient->nom).' '.$patient->prenom;
            $lieu = Auth::guard('medecin')->user()->lieu;
            $route = route('nouvelle-consultation.store');
            Alert::html(
            "<h4>Nouvelle consultaion médicale pour $nom</h4>",
            "
            <form class='custom-form'  method='POST' action='$route'>
                $token
                <div class='form-group'>
                    <input type='text' class='form-control' id='lieu' name='lieu' value='$lieu' placeholder='Lieu' required>
                </div>
                <div class='form-group'>
                    <textarea id='motif' name='motif' rows='5' cols='35' class='form-control form-control-lg' placeholder='Motif' required></textarea>
                </div>
                <input class='form-control' type='hidden' name='id' value='$patient->id'>
                <button type='submit' class='btn btn-primary btn-lg btn-block'>Confirmer</button>
            </form>
            ",
            'success')
            ->persistent(false,true)
            ->iconHtml('<i class="fas fa-file-medical-alt" style="font-size: xxx-large;"></i>')
            ->autoClose(null);

            return redirect()->back();

        }
        catch(ModelNotFoundException $e)
        {
            $cin = $request->input('cin');
            Alert::error('Patient non trouvé', " Le CIN \"$cin\" n'appartient à aucun patient");
            return redirect()->route('medecin.dashboard');
        }
    }


}
