<?php
namespace App\Http\Controllers\Patient\acceuil;

use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Session;


class profileController extends Controller
{
    public function show()
    {
        $id = Auth::guard('patient')->user()->id;
        $patient = Patient::where('id', $id)->first();
        return view('patient.acceuil.profile', [
            'patient' => $patient,
        ]);
    }
    public function updatePwd(){
        return view('patient.acceuil.profile');
    }
    public function edit(){
        if(strcmp(request('current_password'), request('pass'))==0){
            return back()->with('error' , 'Votre ancien mot de passe ne doit pas etre le meme que le nouveau mot de passe  ');
        }
        if(!strcmp(request('pass'), request('new_password'))==0){
            return back()->with('error' , 'Le nouveau mot de passe doit etre le meme que le mode de passe confirmé');
        }
if(!(Hash::check(request('current_password'), Auth::guard('patient')->user()->password))){
    return back()->with('error' , ' Votre ancien mot de passe est incorrecte  ');
}

request()->validate([
    'pass'=> 'required|string|min:8|confirmed' ,

]);


$user = Auth::guard('patient')->user();
$user->password = bcrypt(request('pass'));
$user->save();
return back()->with('mes' , ' 3la slamtna  ');
}
    }
