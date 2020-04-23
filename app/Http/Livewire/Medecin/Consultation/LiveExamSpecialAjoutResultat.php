<?php

namespace App\Http\Livewire\Medecin\Consultation;

use App\Consultation;
use App\Examen_specialise;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LiveExamSpecialAjoutResultat extends Component
{
    protected $listeners = ['updatedSelect' => 'switchType'];

    public $consultation, $examen;
    public $type, $select;

    public function mount($data){
        $this->select = $this->type = Request::segment(7);
        $this->consultation = $data['consultation'];
        $this->examen = $data['examen'];
    }

    public function render()
    {
        if ($this->type === "text") {
            $this->emit('quill');
        }
        return view('livewire.medecin.consultation.live-exam-special-ajout-resultat');
    }

    public function submitText($formData){
        $this->examen->resultat = json_encode([
            'type' => 'text',
            'text' => $formData['data-textarea'],
        ]);

        $this->examen->save();

        return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => Crypt::encrypt($this->consultation->id), 'examen_id' => Crypt::encrypt($this->examen->id) ]);
    }

    public function updatedSelect(){
        $this->emit('updatedSelect');
    }

    public function switchType(){
        return redirect()->route('medecin.consultation.showExamSpecialAjoutResultat', [ 'consultation_id' => Crypt::encrypt($this->consultation->id), 'examen_id' => Crypt::encrypt($this->examen->id), 'type' => $this->select ]);
    }

}
