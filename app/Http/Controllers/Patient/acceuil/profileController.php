<?php
namespace App\Http\Controllers\Patient\acceuil;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class profileController extends Controller
{
    public function show()
    {
        $id = Auth::guard('patient')->user()->id;
        $patient=   Patient::where('id',$id)->first();
        return view('patient.acceuil.profile' , [
            'patient' => $patient,
        ]

    );
    }

}
