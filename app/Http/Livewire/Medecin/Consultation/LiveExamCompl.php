<?php

namespace App\Http\Livewire\Medecin\Consultation;

use App\Consultation;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LiveExamCompl extends Component
{
    public $consultation;

    public function mount(){
        $this->consultation = Consultation::findOrFail(Request::segment(3));
    }

    public function render()
    {
        return view('livewire.medecin.consultation.live-exam-compl');
    }

    public function createExam(){
        return redirect()->route('medecin.consultation.createExamCompl', [ 'consultation_id' => $this->consultation->id ]);
    }

    public function test(){
        dd($this->consultation->ECs);
    }
}
