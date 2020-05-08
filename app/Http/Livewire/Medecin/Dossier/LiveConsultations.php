<?php

namespace App\Http\Livewire\Medecin\Dossier;

use App\Consultation;
use Livewire\Component;
use Livewire\WithPagination;

class LiveConsultations extends Component
{
    use WithPagination;

    public $patient, $searchInput;
    protected $data;
    protected $listeners = ['search'];

    public function mount($patient){
        $this->searchInput = "";
        $this->patient = $patient;
        $this->data = $this->getData();
    }

    public function render()
    {
        if ( $this->searchInput === "" ){
            $this->data = $this->getData();
        }else{
            $this->updatingSearchInput();
            $this->updatedSearchInput();
        }
        return view('livewire.medecin.dossier.live-consultations',[
            'consultations' => $this->data
        ]);
    }

    public function getData(){

        return Consultation::where('patient_id', $this->patient->id)->orderByDesc('created_at')->paginate(5);
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput(){
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        if (!empty($this->searchInput)) {

        $this->data = Consultation::where('patient_id', $this->patient->id)
        ->whereDate('date', $this->searchInput)
        ->paginate(5);
        }

    }
}
