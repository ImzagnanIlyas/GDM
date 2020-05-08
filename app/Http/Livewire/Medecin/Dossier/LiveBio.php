<?php

namespace App\Http\Livewire\Medecin\Dossier;

use App\Examen_general;
use Livewire\Component;
use Livewire\WithPagination;

class LiveBio extends Component
{
    use WithPagination;

    public $patient, $searchInput;
    protected $data;
    protected $listeners = ['search'];

    public function mount($patient){
        $this->patient = $patient;
        $this->data = $this->getData();
    }

    public function render()
    {
        if ( empty($this->searchInput) ){
            $this->data = $this->getData();
        }else{
            $this->updatingSearchInput();
            $this->updatedSearchInput();
        }
        return view('livewire.medecin.dossier.live-bio',[
            'EG' => $this->data
        ]);
    }

    public function getData(){
        $EG = Examen_general::
                join('consultations' , 'consultations.id' , 'examen_generals.consultation_id')
                ->where('consultations.patient_id', $this->patient->id)
                ->orderByDesc('examen_generals.created_at')
                ->paginate(5);

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

        $this->data = Examen_general::join('consultations' , 'consultations.id' , 'examen_generals.consultation_id')
        ->where([
            ['consultations.patient_id', $this->patient->id],
            ['consultations.date','=',$this->searchInput],
            ])->paginate(5);
        }

    }
}
