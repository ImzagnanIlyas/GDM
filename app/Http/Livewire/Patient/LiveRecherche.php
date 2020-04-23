<?php

namespace App\Http\Livewire\Patient;

use App\Patient;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LiveRecherche extends Component
{
    public $query, $segment;
    protected $patients = [];

    public function mount(){
        $this->query = "";
        $this->patients = [];
        $this->segment = Request::segment(2);
    }

    public function render()
    {
        if ($this->query === "") {
            $this->patients = [];
        }
        return view('livewire.patient.live-recherche', [
            'patients' => $this->patients
        ]);
    }

    public function updatedQuery(){
        $this->patients = Patient::where('cin','like',$this->query.'%')->get();
    }

    public function ordonnance($patientId){
        return redirect()->route('pharmacie.ordonnance', ['id' => Crypt::encrypt($patientId)]);
    }
}
