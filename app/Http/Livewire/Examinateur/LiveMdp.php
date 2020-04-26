<?php

namespace App\Http\Livewire\Examinateur;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LiveMdp extends Component
{
    public $examinateur;
    public $old_password, $password, $password_confirmation;

    public function mount(){
        $this->examinateur = Auth::guard('examinateur')->user();
        $this->old_password = "";
        $this->password = "";
        $this->password_confirmation = "";
    }

    public function render()
    {
        return view('livewire.examinateur.live-mdp');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'old_password' => 'required|min:8',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
    }

    public function submit($formData){
        $validatedData = null;
        $validatedData = $this->validate([
            'old_password' => 'required|min:8',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        if ($validatedData) {
            if (Hash::check($formData['old_password'], $this->examinateur->password)) {
                $tmp = Auth::guard('examinateur')->user();
                $tmp->password = bcrypt($formData['password']);
                $tmp->save();
                session()->flash('message', 'Mise à jour réussie');
                $this->mount();
            }else {
                session()->flash('not', 'Echec de la mise à jour. Mot de passe actuel est incorrect');
                $this->mount();
            }
        }
    }
}
