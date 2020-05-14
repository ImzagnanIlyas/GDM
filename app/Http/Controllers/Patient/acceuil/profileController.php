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
    public function edit(Request $request){
if(!(Hash::check($request->get('current_password'), Auth::guard('patient')->user()->password))){
    return back()->with('error' , 'Your current password does not match with what you provided ');
}
if(strcmp($request->get('current_password'), $request->get('new_password'))==0){
    return back()->with('error' , 'Your current password cannot be same with the new password');
}
$request->validate([
    'current_password'=> 'required' ,
    'new_password'=> 'required|confirmed'
]);
$user = Auth::guard('patient')->user();
$user->password = bcrypt($request->get('new_password'));
$user->save();
return back()->with('message','password changed successfully');
    }
}
