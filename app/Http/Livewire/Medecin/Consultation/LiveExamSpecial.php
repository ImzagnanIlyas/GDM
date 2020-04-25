<?php

namespace App\Http\Livewire\Medecin\Consultation;

use App\Consultation;
use App\Examen_specialise;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
Use RealRashid\SweetAlert\Facades\Alert;

class LiveExamSpecial extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public $consultation;
    public $route, $consultationId;

    public function mount($consultation){
        $this->consultation = $consultation;
        $this->route = route('medecin.consultation.storeExamSpecial');
        $this->consultationId = $this->consultation->id;
    }


    public function render()
    {
        return view('livewire.medecin.consultation.live-exam-special');
    }

    public function showCreateForm(){
        Alert::html(
        '<h1>Ajouter un examen</h1>',
        "
        <form class='custom-form'  method='GET' action='$this->route'>
            <div class='form-group'>
                <label for='nom'>Titre d'examen</label>
                <input type='text' class='form-control' id='nom' name='nom' placeholder='' required>
                <input type='text' class='form-control' id='consultationId' name='consultationId' value='$this->consultationId' hidden>
            </div>
            <button type='submit' class='btn btn-primary btn-lg btn-block'>Confirmer</button>
        </form>
        "
        )
        ->persistent(false,true)
        ->autoClose(null);
        return redirect()->route('medecin.consultation.showExamSpecial', [ 'consultation_id' => Crypt::encrypt($this->consultation->id) ]);
    }

    public function ConfirmForm(){
        return redirect()->route('medecin.home');
    }

    public function showResultat($id){
        $tmp = Examen_specialise::findOrFail($id);
        $resultat = json_decode($tmp->resultat);
        if ( $resultat->type === 'text' ) {
            Alert::html(
                "<h1>Résultat d'examen</h1>",
                '<div id="quill-textarea" style="color: black">
                    '.$resultat->text.'
                </div>'
            )
            ->persistent(false,true)
            ->autoClose(null)
            ->width('50rem');
        }
        return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $this->consultation->id, 'examen_id' => $tmp->id ]);
    }

}
