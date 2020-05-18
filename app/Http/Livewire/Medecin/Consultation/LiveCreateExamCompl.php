<?php

namespace App\Http\Livewire\Medecin\Consultation;

use App\Consultation;
use App\Examen_complimentaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class LiveCreateExamCompl extends Component
{
    public $consultation;
    public $x, $examentype, $imtype, $im_examen , $autretype, $prescription;
    protected $listeners = ['AB','IM'];

    public function mount($consultation){
        $this->consultation = $consultation;
        $this->examentype = null;
        $this->im_examen = [];
        $this->autretype = "";
        $this->prescription = "";
    }

    public function render()
    {
        $this->emit('quill', empty($this->prescription));
        return view('livewire.medecin.consultation.live-create-exam-compl');
    }

    public function updatingExamentype($value){
        if ($value === "Autre") {
            $medecin = Auth::guard('medecin')->user();
            setlocale (LC_TIME, 'fr_FR.utf8','fra');
            $this->prescription =
            "<p class='ql-align-right'><strong>Le ".strftime("%A %d %B %Y")."</strong></p><p><strong>Docteur ".strtoupper($medecin->patient->nom)." ".$medecin->patient->prenom."</strong></p><p><strong>Médecin ".$medecin->specialite."</strong></p><p><strong>".$medecin->lieu."</strong></p><p><strong>".$medecin->tele_pro."</strong></p><p>&nbsp;</p>
            <p><br></p><p>Patient : ".strtoupper($this->consultation->patient->nom)." ".$this->consultation->patient->prenom."</p><p>&nbsp;</p>";

        }else{
            $this->prescription = "";
        }
    }

    public function updatedImtype(){
        if ($this->imtype === "Radiographie") {
            $this->im_examen = ['Angiographie','Arthographie','Coronarographie','Cystographie','Densitométrie osseuse','Hystérosalpingographie','Lavement baryté','Mammographie','Myélographie','Radiographie standard','Radiographie osseuse','Radiographie pulmonaire','Sialographie','Transit oeso-gastro-duodénal','Urographie'];
        }
        elseif ($this->imtype === "Echographie") {
            $this->im_examen = ['Doppler','Echographie','Echographie cardiaque ou échocardiographie','Echographie mammaire','Echographie obstétricale','Echographie pelvienne'];
        }
        elseif ($this->imtype === "IRM"){
            $this->im_examen = ['IRM'];
        }
        elseif ($this->imtype === "Scanner"){
            $this->im_examen = ['Scanner','Scanner cérébral','Scanner coronaire ou coroscanner'];
        }
        elseif ($this->imtype === "Endoscopie"){
            $this->im_examen = ['Arthroscopie','Cystoscopie','Coloscopie','Fibroscopie bronchique','Endoscopie ou fibroscopie','Fibroscopie oeso-gastro-duodénale ou fibroscopie digestive haute','Hystéroscopie'];
        }
        elseif ($this->imtype === "Scintigraphie"){
            $this->im_examen = ['Scintigraphie cérébrale','Scintigraphie osseuse','Scintigraphie cardiaque','Scintigraphie pulmonaire','Scintigraphie thyroïdienne','Tomographie par émission TEP-FDG'];
        }
    }

    public function do(){
        dd($this->x, $this->imtype);
    }

    public function AB($basique, $autre){
        $this->x = array_merge($basique, $autre);
        if (!empty($this->x)) {
            $medecin = Auth::guard('medecin')->user();
            setlocale (LC_TIME, 'fr_FR.utf8','fra');
            $this->prescription =
            "<p class='ql-align-right'><strong>Le ".strftime("%A %d %B %Y")."</strong></p><p><strong>Docteur ".strtoupper($medecin->patient->nom)." ".$medecin->patient->prenom."</strong></p><p><strong>Médecin ".$medecin->specialite."</strong></p><p><strong>".$medecin->lieu."</strong></p><p><strong>".$medecin->tele_pro."</strong></p><p>&nbsp;</p>
            <p><br></p><p>Patient : ".strtoupper($this->consultation->patient->nom)." ".$this->consultation->patient->prenom."</p><p>&nbsp;</p><p>Les analyses biologiques :</p>";

            foreach ($this->x as $analyse) {
                $this->prescription .=
                "<ul><li><strong>$analyse</strong></li></ul>";
            }
        }
    }

    public function IM($data){
        $this->x = $data;
        if (!empty($this->x)) {
            $medecin = Auth::guard('medecin')->user();
            setlocale (LC_TIME, 'fr_FR.utf8','fra');
            $this->prescription =
            "<p class='ql-align-right'><strong>Le ".strftime("%A %d %B %Y")."</strong></p><p><strong>Docteur ".strtoupper($medecin->patient->nom)." ".$medecin->patient->prenom."</strong></p><p><strong>Médecin ".$medecin->specialite."</strong></p><p><strong>".$medecin->lieu."</strong></p><p><strong>".$medecin->tele_pro."</strong></p><p>&nbsp;</p>
            <p><br></p><p>Patient : ".strtoupper($this->consultation->patient->nom)." ".$this->consultation->patient->prenom."</p><p>&nbsp;</p><p>$this->imtype :</p>";

            foreach ($this->x as $examen) {
                $this->prescription .=
                "<ul><li><strong>$examen</strong></li></ul>";
            }
        }
    }

    public function confirmer($formData){
        if ($this->examentype === "Autre") {
            $type = $this->autretype;
        }else{
            $type = $this->examentype;
        }
        $tmp = new Examen_complimentaire();
        $tmp->consultation_id = $this->consultation->id;
        $tmp->bilan = json_encode([
            'type' => $type,
            'text' => $formData['data-textarea'],
        ]);

        $tmp->save();

        Alert::success('Examen complémentaire ajouté avec succès');
        return redirect()->route('medecin.consultation.showExamCompl', [ 'consultation_id' => Crypt::encrypt($this->consultation->id) ]);
    }

}
