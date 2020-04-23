<?php

namespace App\Http\Livewire\Patient;

use App\Pharmacie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveProfil extends Component
{
    public $pharmacie;
    public $titre, $adresse, $telephone;

    public function mount(){
        $this->pharmacie = Auth::guard('pharmacie')->user();
        $this->titre = $this->pharmacie->nom;
        $this->adresse = $this->pharmacie->adresse;
        $this->telephone = $this->pharmacie->tele;
    }

    public function render()
    {
        return view('livewire.patient.live-profil');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'titre' => 'required|min:5',
            'adresse' => 'required|min:5',
            'telephone' => 'required|regex:/(0)[5-7][0-9]{8}/',
        ]);
    }

    public function do($formData){
        if ($formData['titre'] != $this->pharmacie->nom OR $formData['adresse'] != $this->pharmacie->adresse OR $formData['telephone'] != $this->pharmacie->tele) {
            $tmp = Auth::guard('pharmacie')->user();
            $tmp->nom = $formData['titre'];
            $tmp->adresse = $formData['adresse'];
            $tmp->tele = $formData['telephone'];
            $tmp->save();
            $this->mount();
            session()->flash('message', 'Mise à jour réussie');
        }
    }
}
