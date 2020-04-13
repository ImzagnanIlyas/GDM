<?php

namespace App\Http\Livewire\Medecin\Consultation;

use App\Consultation;
use App\Medicament;
use App\Prescription_medicamenteuse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class LiveOrdonnance extends Component
{
    public $consultation, $ajout, $medicaments, $medecin;
    public $pms, $ordonnance;


    public function mount(){
        $this->consultation = Consultation::findOrFail(Request::segment(3));
        $this->medicaments = Medicament::all();
        $this->medecin = Auth::guard('medecin')->user();
        $this->ordonnance = "";
        $this->ajout = false;
        $this->pms = array();
    }

    public function render()
    {
        if (! $this->ajout) { $this->emit('quill', empty($this->pms)); }

        return view('livewire.medecin.consultation.live-ordonnance', [
            'pms' => $this->pms,
        ]);
    }

    public function storePM($formData){
        $tmp = new Prescription_medicamenteuse();
        $tmp->consultation_id = $this->consultation->id;
        $tmp->medicament_id = intval($formData['medicament']);
        $tmp->dose = $formData['dose'];
        $tmp->voie = $formData['voie'];
        $tmp->rythme = $formData['rythme'];
        $tmp->date_debut = $formData['ddd'];
        $tmp->duree = $formData['duree'];
        $tmp->commentaire = $formData['commentaire'];

        $this->pms[] = $tmp;
        $this->generer();
        $this->ajout = false;
    }

    public function switchAjout($tmp){
        $this->ajout = $tmp;
    }

    public function generer(){
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $this->ordonnance =
        "<p class='ql-align-right'><strong>Le ".strftime("%A %d %B %Y").", à ".strftime("%H:%M")."</strong></p><p><strong>Docteur ".strtoupper($this->medecin->patient->nom)." ".$this->medecin->patient->prenom."</strong></p><p><strong>Médecin ".$this->medecin->specialite."</strong></p><p><strong>".$this->medecin->lieu."</strong></p><p><strong>".$this->medecin->tele_pro."</strong></p><p>&nbsp;</p>
        <p><br></p><p>Patient : ".strtoupper($this->consultation->patient->nom)." ".$this->consultation->patient->prenom."</p><p>&nbsp;</p>";

        foreach ($this->pms as $key => $pm) {
            $medicament = Medicament::find($pm['medicament_id']);
            $this->ordonnance .=
            "<p>".$medicament->nom." (".$medicament->dosage.$medicament->unite_dosage.") (".$medicament->forme."), ".$pm['dose']." (".$pm['voie'].") ".$pm['rythme'].", commençant ".$pm['date_debut']." ".$pm['duree']."</p>
            <blockquote><span style='color: rgb(68, 68, 68);'>".$pm['commentaire']."</span></blockquote><p><br></p>";
        }
    }

    public function confirmer($formData){

        foreach( $this->pms as $key => $pm ){
            $tmp = new Prescription_medicamenteuse();

            $tmp->consultation_id = $this->consultation->id;
            $tmp->medicament_id = $pm['medicament_id'];
            $tmp->dose = $pm['dose'];
            $tmp->voie = $pm['voie'];
            $tmp->rythme = $pm['rythme'];
            $tmp->date_debut = $pm['date_debut'];
            $tmp->duree = $pm['duree'];
            $tmp->commentaire = $pm['commentaire'];

            $tmp->save();
        }

        $this->consultation->ordonnance = $formData['data-textarea'];
        $this->consultation->save();

        Alert::success('Ordonnance ajouté avec succès');
        return redirect()->route('medecin.consultation.showOrdonnance', [ 'consultation_id' => $this->consultation->id ]);
    }

}
