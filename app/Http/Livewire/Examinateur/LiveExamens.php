<?php

namespace App\Http\Livewire\Examinateur;

use App\Examen_complimentaire;
use Livewire\Component;
use Livewire\WithPagination;

class LiveExamens extends Component
{
    use WithPagination;

    public $patient;
    protected $examens;

    public function mount($patient){
        $this->patient = $patient;
        $this->examens = Examen_complimentaire::
                        join('consultations', 'examen_complimentaires.consultation_id', '=', 'consultations.id')
                        ->select('examen_complimentaires.id','examen_complimentaires.bilan','examen_complimentaires.confirmation','examen_complimentaires.examinateur_id','examen_complimentaires.created_at','examen_complimentaires.updated_at')
                        ->where('consultations.patient_id','=',$this->patient->id)
                        ->orderByDesc('examen_complimentaires.created_at')
                        ->paginate(3);
    }

    public function render()
    {
        $this->examens = Examen_complimentaire::
                        join('consultations', 'examen_complimentaires.consultation_id', '=', 'consultations.id')
                        ->select('examen_complimentaires.id','examen_complimentaires.bilan','examen_complimentaires.confirmation','examen_complimentaires.examinateur_id','examen_complimentaires.created_at','examen_complimentaires.updated_at')
                        ->where('consultations.patient_id','=',$this->patient->id)
                        ->orderByDesc('examen_complimentaires.created_at')
                        ->paginate(3);
        return view('livewire.examinateur.live-examens', [
            'examens' => $this->examens
        ]);
    }

    public function paginationView()
    {
        return 'livewire.examinateur.custom-pagination-links-view';
    }
}
