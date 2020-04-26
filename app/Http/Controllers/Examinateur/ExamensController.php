<?php

namespace App\Http\Controllers\Examinateur;

use App\Examen_complimentaire;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ExamensController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('examinateur.auth:examinateur');
    }

    public function showExams($patient_id)
    {
        try {
            $decrypted = Crypt::decrypt($patient_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        $patient = Patient::findOrFail($decrypted);
        // $collection = collect();
        // foreach ($patient->consultations as $consultation) {
        //     foreach ($consultation->ECs as $EC) {
        //         $collection->add($EC);
        //     }
        // }
        // $collection = $collection->sortByDesc('created_at');

        // $collection = Examen_complimentaire::
        //                 join('consultations', 'examen_complimentaires.consultation_id', '=', 'consultations.id')
        //                 ->where('consultations.patient_id','=',$patient->id)
        //                 ->orderByDesc('examen_complimentaires.created_at')
        //                 ->get();

        return view('examinateur.examens', [
            'patient' => $patient
        ]);
    }

    public function showExamsBilan($examen_id)
    {
        try {
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('examinateur.examens-bilan', [
            'examen' => Examen_complimentaire::findOrFail($decrypted),
        ]);
    }

    public function showExamsAjoutResultat($examen_id){
        try {
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        if (Examen_complimentaire::findOrFail($decrypted)->confirmation) {
            abort(403, 'Cette fonction n\'est plus autorisé pour ce examen');
        }else{
            return view('examinateur.examens-ajoutResultat', [
                'examen' => Examen_complimentaire::findOrFail($decrypted),
            ]);
        }
    }

    public function showExamsResultat($examen_id){
        try {
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('examinateur.examens-resultat', [
            'examen' => Examen_complimentaire::findOrFail(Crypt::decrypt($examen_id)),
        ]);
    }

    public function showExamsResultatPDF($examen_id, $i){
        try {
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        $examen = Examen_complimentaire::findOrFail($decrypted);
        $resultat = json_decode($examen->resultat);
        return response()->file( public_path('storage/'.$resultat->pdf[$i-1]) );
    }

    public function storeFiles(Request $request){
        $examen_id = $request->input('examen_id');
        $type = $request->input('type');
        $examen = Examen_complimentaire::findOrFail($examen_id);
        $links_tab = [];

        if ($examen->confirmation) {
            abort(403, 'Cette fonction n\'est plus autorisé pour ce examen');
        }else{
            $examen->confirmation = true;
            $examen->examinateur_id = Auth::guard('examinateur')->user()->id;
            if ( $type === "pdf" ){

                request()->validate([
                    'data' => 'required',
                    'data.*' => 'mimes:pdf|max:5120‬'
                ]);

                if($request->hasfile('data')){
                    foreach($request->file('data') as $file){
                        array_push($links_tab, $file->store('resultat_examen_complementaire/pdf'));
                    }
                }
                $examen->resultat = json_encode([
                    'type' => 'pdf',
                    'pdf' => $links_tab,
                ]);

                $examen->save();
                return redirect()->route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($examen->id) ]);

            }elseif ( $type === "image" ){

                request()->validate([
                    'data' => 'required',
                    'data.*' => 'image|max:10240‬'
                ]);

                if($request->hasfile('data')){
                    foreach($request->file('data') as $file){
                        array_push($links_tab, $file->store('resultat_examen_complementaire/image'));
                    }
                }
                $examen->resultat = json_encode([
                    'type' => 'image',
                    'image' => $links_tab,
                ]);

                $examen->save();
                return redirect()->route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($examen->id) ]);

            }elseif ( $type === "video" ){

                request()->validate([
                    'data' => 'required',
                    'data.*' => 'mimes:mp4,avi,flv,mov,wmv|max:102400‬'
                ]);

                if($request->hasfile('data')){
                    foreach($request->file('data') as $file){
                        array_push($links_tab, $file->store('resultat_examen_complementaire/video'));
                    }
                }
                $examen->resultat = json_encode([
                    'type' => 'video',
                    'video' => $links_tab,
                ]);

                $examen->save();
                return redirect()->route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($examen->id) ]);

            }elseif ( $type === "audio" ){

                request()->validate([
                    'data' => 'required',
                    'data.*' => 'mimes:mp3,mpga,wav,ogg|max:20480‬'
                ]);

                if($request->hasfile('data')){
                    foreach($request->file('data') as $file){
                        array_push($links_tab, $file->store('resultat_examen_complementaire/audio'));
                    }
                }
                $examen->resultat = json_encode([
                    'type' => 'audio',
                    'audio' => $links_tab,
                ]);

                $examen->save();
                return redirect()->route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($examen->id) ]);
            }
        }
    }
}
