<?php

namespace App\Http\Livewire\Medecin;

use App\Medicament;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class LiveMedicaments extends Component
{
    use WithPagination;

    public $searchInput;
    protected $medicaments;
    protected $listeners = ['search'];

    public function mount(){
        $this->searchInput = "";
        $this->medicaments = DB::table('medicaments')->paginate(10);
    }

    public function render()
    {
        if ($this->searchInput === ""){
            $this->medicaments = DB::table('medicaments')->paginate(10);
        }else{
            $this->updatingSearchInput();
            $this->updatedSearchInput();
        }
        return view('livewire.medecin.live-medicaments', [
            'medicaments' => $this->medicaments
        ]);
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput()
   {
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        $this->medicaments = Medicament::where(
            'nom','like',$this->searchInput.'%'
            )->paginate(5);
    }
}
