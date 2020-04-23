<?php

namespace App\Http\Livewire\Medecin;

use App\Consultation;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LiveMesConsultationsPatient extends Component
{
    use WithPagination;

    public $patient;
    protected $consultations;

    public function mount($patient){
        $this->patient = $patient;
        $this->consultations = Consultation::where([
            ['medecin_id',  Auth::guard('medecin')->user()->id],
            ['patient_id', $this->patient->id],
        ])->orderBy('created_at', 'desc')->paginate(5);
    }
    public function render()
    {
        $this->consultations = Consultation::where([
            ['medecin_id',  Auth::guard('medecin')->user()->id],
            ['patient_id', $this->patient->id],
        ])->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.medecin.live-mes-consultations-patient', [
            'consultations' => $this->consultations
        ]);
    }
}
