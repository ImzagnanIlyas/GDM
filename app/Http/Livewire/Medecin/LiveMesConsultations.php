<?php

namespace App\Http\Livewire\Medecin;

use App\Consultation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LiveMesConsultations extends Component
{
    use WithPagination;

    public $searchInput;
    protected $consultations;
    protected $listeners = ['search'];

    public function mount(){
        $this->searchInput = "";
        $this->consultations = Consultation::where('medecin_id',  Auth::guard('medecin')
            ->user()->id)->orderBy('created_at', 'desc')->paginate(5);
    }

    public function render()
    {
        if ($this->searchInput === ""){
            $this->consultations = Consultation::where('medecin_id',  Auth::guard('medecin')->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        }else{
            $this->updatingSearchInput();
            $this->updatedSearchInput();
        }
        return view('livewire.medecin.live-mes-consultations', [
            'consultations' => $this->consultations
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
        $this->consultations = Consultation::where([
            ['medecin_id',  Auth::guard('medecin')->user()->id],
            ['date','=',$this->searchInput],
            ])->paginate(5);
    }
}
