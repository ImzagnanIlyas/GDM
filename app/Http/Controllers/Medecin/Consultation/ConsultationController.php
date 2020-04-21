<?php

namespace App\Http\Controllers\Medecin\Consultation;

use App\Consultation;
use App\Examen_complimentaire;
use App\Examen_specialise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\UploadedFile;

class ConsultationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }

    public function showInfo($id)
    {
        return view('medecin.consultation.consultation-info', [
            'consultation' => Consultation::findOrFail($id)
        ]);
    }


    /**************************************************************************
     * Examen spécialisé functions
     **************************************************************************
     */

    public function showExamSpecial($consultation_id)
    {
        return view('medecin.consultation.consultation-examSpecial', [
            'consultation' => Consultation::findOrFail($consultation_id)
        ]);
    }

    public function storeExamSpecial(Request $request)
    {
        $tmp = new Examen_specialise();
        $tmp->consultation_id = $request->input('consultationId');
        $tmp->nom = $request->input('nom');
        $tmp->save();

        Alert::success('Examen créé avec succès');
        return redirect()->back();
    }

    public function showExamSpecialAjoutResultat($consultation_id){
        return view('medecin.consultation.consultation-examSpecialAjoutResultat', [
            'consultation' => Consultation::findOrFail($consultation_id)
        ]);
    }

    public function showExamSpecialResultat($consultation_id, $examen_id){
        return view('medecin.consultation.consultation-examSpecialResultat', [
            'consultation' => Consultation::findOrFail($consultation_id),
            'examen' => Examen_specialise::findOrFail($examen_id),
        ]);
    }

    public function showExamSpecialResultatPDF($consultation_id, $examen_id, $i){
        $examen = Examen_specialise::findOrFail($examen_id);
        $resultat = json_decode($examen->resultat);
        return response()->file( public_path('storage/'.$resultat->pdf[$i-1]) );
    }

    // Examen spécialisé functions :: Files store function

    public function storeFiles(Request $request,$examen_id, $type){

        $examen = Examen_specialise::findOrFail($examen_id);
        $links_tab = [];

        if ( $type === "pdf" ){

            request()->validate([
                'data' => 'required',
                'data.*' => 'mimes:pdf|max:5120‬'
            ]);

            if($request->hasfile('data')){
                foreach($request->file('data') as $file){
                    array_push($links_tab, $file->store('resultat_examen_specialise/pdf'));
                }
            }
            $examen->resultat = json_encode([
                'type' => 'pdf',
                'pdf' => $links_tab,
            ]);

            $examen->save();
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $examen->consultation->id, 'examen_id' => $examen->id ]);

        }elseif ( $type === "image" ){

            request()->validate([
                'data' => 'required',
                'data.*' => 'image|max:10240‬'
            ]);

            if($request->hasfile('data')){
                foreach($request->file('data') as $file){
                    array_push($links_tab, $file->store('resultat_examen_specialise/image'));
                }
            }
            $examen->resultat = json_encode([
                'type' => 'image',
                'image' => $links_tab,
            ]);

            $examen->save();
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $examen->consultation->id, 'examen_id' => $examen->id ]);

        }elseif ( $type === "video" ){

            request()->validate([
                'data' => 'required',
                'data.*' => 'mimes:mp4,avi,flv,mov,wmv|max:102400‬'
            ]);

            if($request->hasfile('data')){
                foreach($request->file('data') as $file){
                    array_push($links_tab, $file->store('resultat_examen_specialise/video'));
                }
            }
            $examen->resultat = json_encode([
                'type' => 'video',
                'video' => $links_tab,
            ]);

            $examen->save();
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $examen->consultation->id, 'examen_id' => $examen->id ]);

        }elseif ( $type === "audio" ){

            request()->validate([
                'data' => 'required',
                'data.*' => 'mimes:mp3,mpga,wav,ogg|max:20480‬'
            ]);

            if($request->hasfile('data')){
                foreach($request->file('data') as $file){
                    array_push($links_tab, $file->store('resultat_examen_specialise/audio'));
                }
            }
            $examen->resultat = json_encode([
                'type' => 'audio',
                'audio' => $links_tab,
            ]);

            $examen->save();
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $examen->consultation->id, 'examen_id' => $examen->id ]);
        }
    }

    /**************************************************************************
     * Ordonnance functions
     **************************************************************************
     */

    public function showOrdonnance($consultation_id)
    {
        return view('medecin.consultation.consultation-ordonnance', [
            'consultation' => Consultation::findOrFail($consultation_id)
        ]);
    }

    /**************************************************************************
     * Examen complémentaire functions
     **************************************************************************
     */

    public function showExamCompl($consultation_id)
    {
        return view('medecin.consultation.consultation-examCompl', [
            'consultation' => Consultation::findOrFail($consultation_id)
        ]);
    }

    public function createExamCompl($consultation_id)
    {
        return view('medecin.consultation.consultation-examComplCreation', [
            'consultation' => Consultation::findOrFail($consultation_id)
        ]);
    }

    public function showExamComplBilan($consultation_id, $examen_id)
    {
        return view('medecin.consultation.consultation-examComplBilan', [
            'consultation' => Consultation::findOrFail($consultation_id),
            'examen' => Examen_complimentaire::findOrFail($examen_id),
        ]);
    }

    public function showExamComplResultat($consultation_id, $examen_id){
        return view('medecin.consultation.consultation-examComplResultat', [
            'consultation' => Consultation::findOrFail($consultation_id),
            'examen' => Examen_complimentaire::findOrFail($examen_id),
        ]);
    }

    public function showExamComplResultatPDF($consultation_id, $examen_id, $i){
        $examen = Examen_complimentaire::findOrFail($examen_id);
        $resultat = json_decode($examen->resultat);
        return response()->file( public_path('storage/'.$resultat->pdf[$i-1]) );
    }
}
