<?php

namespace App\Http\Livewire\Medecin;

use Illuminate\Support\Facades\DB;
use App\Consultation;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LiveMesPatients extends Component
{
    use WithPagination;

    public $searchInput, $medecin, $patientsIds;
    protected $patients;

    public function mount(){
        $this->searchInput = "";
        $this->medecin = Auth::guard('medecin')->user();
        $this->patients = $this->getPatients();
    }

    public function render()
    {
        if ($this->searchInput === ""){
            $this->patients = $this->getPatients();
        }else{
            $this->updatedSearchInput();
        }
        return view('livewire.medecin.live-mes-patients', [
            'patients' => $this->patients,
        ]);
    }

    public function getPatients(){
        $medecin = Auth::guard('medecin')->user();
        $consultations = Consultation::where('medecin_id', $medecin->id)->get()->sortByDesc('created_at')->unique('patient_id');
        $ids = [];

        foreach ($consultations as $value) {
            array_push($ids, $value->patient_id);
        }

        $this->patientsIds = array_values($ids);
        $patients = Patient::whereIn('id', array_values($this->patientsIds))->paginate(5);

        return $patients;
    }

    public function updatingSearchInput()
   {
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        $this->patients = Patient::whereIn('id', $this->patientsIds)->where('cin','like',$this->searchInput.'%')->paginate(5);
    }

    public function test(){
        dd($this->patients);
    }

}
