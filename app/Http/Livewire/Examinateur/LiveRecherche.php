<?php

namespace App\Http\Livewire\Examinateur;

use App\Patient;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LiveRecherche extends Component
{
    public $query;
    protected $patients = [];

    public function mount(){
        $this->query = "";
        $this->patients = [];
    }

    public function render()
    {
        if ($this->query === "") {
            $this->patients = [];
        }
        return view('livewire.examinateur.live-recherche', [
            'patients' => $this->patients
        ]);
    }

    public function updatedQuery(){
        $this->patients = Patient::where('cin','like',$this->query.'%')->get();
    }

    public function ordonnance($patientId){
        return redirect()->route('examinateur.showExams', ['patient_id' => Crypt::encrypt($patientId)]);
    }
}
