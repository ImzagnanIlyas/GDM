<?php

namespace App\Http\Livewire\Patient;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Symfony\Component\Console\Input\Input;

class LiveMdp extends Component
{
    public $pharmacie;
    public $old_password, $password, $password_confirmation;

    public function mount(){
        $this->pharmacie = Auth::guard('pharmacie')->user();
        $this->old_password = "";
        $this->password = "";
        $this->password_confirmation = "";
    }

    public function render()
    {
        return view('livewire.patient.live-mdp');
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
            if (Hash::check($formData['old_password'], $this->pharmacie->password)) {
                $tmp = Auth::guard('pharmacie')->user();
                $tmp->password = bcrypt($formData['password']);
                $tmp->save();
                session()->flash('message', 'Post successfully updated.');
                $this->mount();
            }else {
                session()->flash('not', 'MDP incorrecte');
            }
        }
    }
}
