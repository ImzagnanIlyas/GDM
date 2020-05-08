<?php

namespace App\Http\Livewire\Medecin\Dossier;

use App\Prescription_medicamenteuse;
use Livewire\Component;
use Livewire\WithPagination;

class LiveAtcd extends Component
{
    use WithPagination;

    public $patient, $n;
    public $searchInput, $add;
    protected $data;
    protected $listeners = ['search'];

    public function mount($patient, $n){
        $this->patient = $patient;
        $this->n = $n;
        $this->data = $this->getData();
        $add = false;
    }

    public function render()
    {
        if ( empty($this->searchInput) ){
            $this->data = $this->getData();
        }else{
            $this->updatingSearchInput();
            $this->updatedSearchInput();
        }
        return view('livewire.medecin.dossier.live-atcd',[
            'data' => $this->data
        ]);
    }

    public function getData(){
        if ($this->n == 1) {
            $tmp = Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
                            ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                            ->Where([
                                ['consultations.patient_id' , $this->patient->id],
                                ['confirmation' , true]
                                ])
                            ->orderByDesc('prescription_medicamenteuses.created_at')
                            ->paginate(5);
        }elseif ($this->n == 2) {
            $atcd = json_decode($this->patient->atcd);
            $tmp = $atcd->habitudes;
            usort($tmp, function($a, $b) {
                return $b->date <=> $a->date;
            });
        }elseif ($this->n == 3) {
            $atcd = json_decode($this->patient->atcd);
            $tmp = $atcd->chirurgicaux;
            usort($tmp, function($a, $b) {
                return $b->date_operation <=> $a->date_operation;
            });
        }
        return $tmp;
    }

    public function search($value){
        $this->searchInput = $value;
    }

    public function updatingSearchInput(){
        $this->gotoPage(1);
   }

    public function updatedSearchInput(){
        if (!empty($this->searchInput)) {
            if ($this->n == 1) {
                $tmp = Prescription_medicamenteuse::Join('medicaments' , 'medicaments.id' , 'prescription_medicamenteuses.medicament_id')
                                ->Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                                ->Where([
                                    ['consultations.patient_id' , $this->patient->id],
                                    ['confirmation' , true],
                                    ['nom','like',$this->searchInput.'%']
                                    ])
                                ->orderByDesc('prescription_medicamenteuses.created_at')
                                ->paginate(5);
            }elseif ($this->n == 2) {
                $atcd = json_decode($this->patient->atcd);
                $tmp = $atcd->habitudes;

                foreach ($tmp as $key => $val) {
                    if ( strtotime($val->date) != strtotime($this->searchInput) ) {
                        unset($tmp[$key]);
                    }
                }

                usort($tmp, function($a, $b) {
                    return $b->date <=> $a->date;
                });
            }elseif ($this->n == 3) {
                $atcd = json_decode($this->patient->atcd);
                $tmp = $atcd->chirurgicaux;

                foreach ($tmp as $key => $val) {
                    if (! preg_match("*{$this->searchInput}*i", $val->operation) ) {
                        unset($tmp[$key]);
                    }
                }

                usort($tmp, function($a, $b) {
                    return $b->date_operation <=> $a->date_operation;
                });
            }
            $this->data = $tmp;
        }
    }

    public function switchAdd(){
        $this->add = true;
    }
}
