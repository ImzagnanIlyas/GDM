<?php

namespace App\Http\Livewire\Medecin\Dossier;

use App\Examen_complimentaire;
use Livewire\Component;
use Livewire\WithPagination;

class LiveExamens extends Component
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
        return view('livewire.medecin.dossier.live-examens',[
            'examens' => $this->data
        ]);
    }

    public function getData(){
        $EG = Examen_complimentaire::
                join('consultations' , 'consultations.id' , 'examen_complimentaires.consultation_id')
                ->select('examen_complimentaires.*')
                ->where('consultations.patient_id', $this->patient->id)
                ->orderByDesc('examen_complimentaires.created_at')
                ->paginate(4);

        return $EG;
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput(){
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        if (!empty($this->searchInput)) {

        $this->data = Examen_complimentaire::join('consultations' , 'consultations.id' , 'examen_complimentaires.consultation_id')
            ->select('examen_complimentaires.*')
            ->where('consultations.patient_id', $this->patient->id)
            ->whereDate('examen_complimentaires.updated_at', $this->searchInput)
            ->paginate(4);
        }

    }
}
