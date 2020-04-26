<?php

namespace App\Http\Livewire\Examinateur;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveProfil extends Component
{
    public $examinateur;
    public $titre, $adresse, $telephone;

    public function mount(){
        $this->examinateur = Auth::guard('examinateur')->user();
        $this->titre = $this->examinateur->nom;
        $this->adresse = $this->examinateur->adresse;
        $this->telephone = $this->examinateur->tele;
    }

    public function render()
    {
        return view('livewire.examinateur.live-profil');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'titre' => 'required|min:5',
            'adresse' => 'required|min:5',
            'telephone' => 'required|regex:/(0)[5-7][0-9]{8}/',
        ]);
    }

    public function submit($formData){
        $validator = $this->validate([
            'titre' => 'required|min:5',
            'adresse' => 'required|min:5',
            'telephone' => 'required|regex:/(0)[5-7][0-9]{8}/',
        ]);
        if ($formData['titre'] != $this->examinateur->nom OR $formData['adresse'] != $this->examinateur->adresse OR $formData['telephone'] != $this->examinateur->tele) {
            $tmp = Auth::guard('examinateur')->user();
            $tmp->nom = $formData['titre'];
            $tmp->adresse = $formData['adresse'];
            $tmp->tele = $formData['telephone'];
            $tmp->save();
            $this->mount();
            session()->flash('message', 'Mise à jour réussie');
            return redirect()->route('examinateur.profil');
        }
    }
}
