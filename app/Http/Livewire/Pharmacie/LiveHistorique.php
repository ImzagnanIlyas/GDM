<?php

namespace App\Http\Livewire\Pharmacie;

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
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput()
   {
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){

    }

    public function paginationView()
    {
        return 'livewire.examinateur.custom-pagination-links-view';
    }
}
