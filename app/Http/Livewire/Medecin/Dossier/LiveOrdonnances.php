<?php

namespace App\Http\Livewire\Medecin\Dossier;

use App\Consultation;
use Livewire\Component;
use Livewire\WithPagination;

class LiveOrdonnances extends Component
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
        return view('livewire.medecin.dossier.live-ordonnances',[
            'consultations' => $this->data
        ]);
    }

    public function getData(){
        return Consultation::where('patient_id', $this->patient->id)->whereNotNull('ordonnance')->orderByDesc('created_at')->paginate(5);
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput(){
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        if (!empty($this->searchInput)) {
            $this->data = Consultation::select('consultations.*')
            ->join('prescription_medicamenteuses' , 'prescription_medicamenteuses.consultation_id' , 'consultations.id')
            ->where('consultations.patient_id', $this->patient->id)
            ->whereDate('prescription_medicamenteuses.created_at', $this->searchInput)
            ->paginate(5);


            // $this->data = Consultation::where('patient_id', $this->patient->id)
            //     ->whereNotNull('ordonnance')
            //     ->whereDate(function ($query) {
            //         $query->select('created_at')
            //             ->from('prescription_medicamenteuses')
            //             // ->whereColumn('consultation_id', )
            //             ->first();
            //     }, $this->searchInput)
            //     ->paginate(5);
        }
    }
}

// date('d/m/Y',strtotime($c->PMs->first()->created_at))
