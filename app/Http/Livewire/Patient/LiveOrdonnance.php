<?php

namespace App\Http\Livewire\Patient;

use App\Consultation;
use App\Patient;
use App\Prescription_medicamenteuse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;


class LiveOrdonnance extends Component
{
    public $patient; // Patient séléctioné dans la recherche live.
    public $consultations; // Consultions qui ont des prescriptions donc qui ont une ordonnance.
    public $item;
    public $disabled = "disabled";

    public function mount(){
        $this->patient = Patient::findOrFail(Request::segment(3));
        $this->consultations = $this->getConsultations();
        $this->item = $this->consultations->first();
        $this->getDisabled();
    }

    public function render()
    {
        return view('livewire.patient.live-ordonnance');
    }

    public function getConsultations(){

        $query =  DB::table('prescription_medicamenteuses')
                    ->join('consultations', 'prescription_medicamenteuses.consultation_id', '=', 'consultations.id')
                    ->select('consultation_id')
                    ->where('consultations.patient_id','=',$this->patient->id)
                    ->groupBy('consultation_id')
                    ->get()->toArray();

        $ids = [];
        for ($i=0; $i < sizeof($query); $i++) {
            array_push($ids, $query[$i]->consultation_id);
        }

        return Consultation::findMany(array_values($ids));
    }

    public function getDisabled(){

        if ($this->item) {
            foreach ($this->item->PMs as $PM) {
            if ($PM->confirmation != true) {
                $this->disabled = "";
                break;
            }
            $this->disabled = "disabled";
        }
        }

    }

    public function switchItem($id){
        $this->item = Consultation::findOrFail($id) ;
        $this->getDisabled();
    }

    public function confirmer($formData){
        if ($formData) {
            foreach ($formData as $checkboxId => $status) {
                if ($status === 'on') {
                    $pm = Prescription_medicamenteuse::findOrFail($checkboxId);
                    $pm->confirmation = true;
                    $pm->pharmacie_id = Auth::guard('pharmacie')->user()->id;
                    $pm->save();
                }
            }
            $this->item = Consultation::findOrFail($pm->consultation_id);
            session()->flash('message', 'Post successfully updated.');
        }
    }
}
