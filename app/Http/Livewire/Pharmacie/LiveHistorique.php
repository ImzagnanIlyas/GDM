<?php

namespace App\Http\Livewire\Pharmacie;

use App\Consultation;
use App\Examen_complimentaire;
use App\Prescription_medicamenteuse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LiveHistorique extends Component
{
    use WithPagination;

    public $searchInput;
    protected $ordonnances;
    protected $listeners = ['search'];

    public function mount(){
        $this->searchInput = "";
        $this->ordonnances = $this->getOrdonnances();
    }

    public function render()
    {
        if ($this->searchInput === ""){
            $this->ordonnances = $this->getOrdonnances();
        }else{
            $this->updatedSearchInput();
        }
        return view('livewire.pharmacie.live-historique',[
            'ordonnances' => $this->ordonnances
        ]);
    }

    public function getOrdonnances(){
        return Consultation::select('consultations.*')
                ->join('prescription_medicamenteuses' ,'consultations.id', '=', 'prescription_medicamenteuses.consultation_id')
                ->where('prescription_medicamenteuses.pharmacie_id', Auth::guard('pharmacie')->user()->id)
                ->where('prescription_medicamenteuses.confirmation', true)
                ->groupBy('prescription_medicamenteuses.consultation_id')
                ->paginate(5);
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput()
   {
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        $this->ordonnances = Consultation::select('consultations.*')
                            ->join('prescription_medicamenteuses' ,'consultations.id', '=', 'prescription_medicamenteuses.consultation_id')
                            ->where('prescription_medicamenteuses.pharmacie_id', Auth::guard('pharmacie')->user()->id)
                            ->where('prescription_medicamenteuses.confirmation', true)
                            ->whereDate('prescription_medicamenteuses.created_at', $this->searchInput)
                            ->groupBy('prescription_medicamenteuses.consultation_id')
                            ->paginate(5);
    }

    public function paginationView()
    {
        return 'livewire.examinateur.custom-pagination-links-view';
    }
}
