<?php

namespace App\Http\Livewire\Examinateur;

use App\Examen_complimentaire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LiveHistorique extends Component
{
    use WithPagination;

    public $searchInput;
    protected $examens;
    protected $listeners = ['search'];

    public function mount(){
        $this->searchInput = "";
        $this->examens = $this->getExamens();
    }

    public function render()
    {
        if ($this->searchInput === ""){
            $this->examens = $this->getExamens();
        }else{
            $this->updatedSearchInput();
        }
        return view('livewire.examinateur.live-historique',[
            'examens' => $this->examens
        ]);
    }

    public function getExamens(){
        $tmp = Examen_complimentaire::
                where('examinateur_id', Auth::guard('examinateur')->user()->id)
                ->orderByDesc('updated_at')
                ->paginate(3);
        return $tmp;
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput()
   {
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        $this->examens = Examen_complimentaire::
                        where('examinateur_id', Auth::guard('examinateur')->user()->id)
                        ->whereDate('updated_at','=',$this->searchInput)
                        ->orderByDesc('updated_at')
                        ->paginate(3);
    }
}
