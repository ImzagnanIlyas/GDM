<?php

namespace App\Http\Livewire\Examinateur;

use App\Consultation;
use App\Examen_specialise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LiveExamenAjoutResultat extends Component
{
    protected $listeners = ['updatedSelect' => 'switchType'];

    public $patient, $consultation, $examen;
    public $type, $select;

    public function mount($examen){
        $this->select = $this->type = Request::segment(5);
        $this->examen = $examen;
        $this->consultation = $examen->consultation;
        $this->patient = $this->consultation->patient;
    }

    public function render()
    {
        return view('livewire.examinateur.live-examen-ajout-resultat');
    }

    public function submitText($formData){
        if ($this->examen->confirmation) {
            abort(403, 'Cette fonction n\'est plus autorisé pour ce examen');
        }
        $this->examen->resultat = json_encode([
            'type' => 'text',
            'text' => $formData['data-textarea'],
        ]);
        $this->examen->confirmation = true;
        $this->examen->examinateur_id = Auth::guard('examinateur')->user()->id;
        $this->examen->save();

        return redirect()->route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($this->examen->id) ]);
    }

    public function updatedSelect(){
        if ($this->examen->confirmation) {
            abort(403, 'Cette fonction n\'est plus autorisé pour ce examen');
        }
        $this->emit('updatedSelect');
    }

    public function switchType(){
        return redirect()->route('examinateur.showExamsAjoutResultat', [ 'examen_id' => Crypt::encrypt($this->examen->id), 'type' => $this->select ]);
    }
}
