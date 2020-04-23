<?php

namespace App\Http\Livewire\Medecin\Consultation;

use App\Consultation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LiveExamCompl extends Component
{
    public $consultation;

    public function mount($consultation){
        $this->consultation = $consultation;
    }

    public function render()
    {
        return view('livewire.medecin.consultation.live-exam-compl');
    }

    public function createExam(){
        return redirect()->route('medecin.consultation.createExamCompl', [ 'consultation_id' => Crypt::encrypt($this->consultation->id) ]);
    }

    public function test(){
        dd($this->consultation->ECs);
    }
}
