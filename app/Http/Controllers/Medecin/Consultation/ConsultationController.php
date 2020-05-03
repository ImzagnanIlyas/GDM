<?php

namespace App\Http\Controllers\Medecin\Consultation;

use App\Consultation;
use App\Examen_complimentaire;
use App\Examen_general;
use App\Examen_specialise;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt;

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
        try {
            $decrypted = Crypt::decrypt($id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-info', [
            'consultation' => Consultation::findOrFail(Crypt::decrypt($id))
        ]);
    }


    /**************************************************************************
     * Examen spécialisé functions
     **************************************************************************
     */

    public function showExamSpecial($consultation_id)
    {
        try {
            $decrypted = Crypt::decrypt($consultation_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-examSpecial', [
            'consultation' => Consultation::findOrFail($decrypted)
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

    public function showExamSpecialAjoutResultat($consultation_id, $examen_id){
        try {
            $decrypted = Crypt::decrypt($consultation_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        return view('medecin.consultation.consultation-examSpecialAjoutResultat', [
            'consultation' => Consultation::findOrFail(Crypt::decrypt($consultation_id)),
            'examen' => Examen_specialise::findOrFail(Crypt::decrypt($examen_id)),
        ]);
    }

    public function showExamSpecialResultat($consultation_id, $examen_id){
        try {
            $decrypted = Crypt::decrypt($consultation_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        return view('medecin.consultation.consultation-examSpecialResultat', [
            'consultation' => Consultation::findOrFail(Crypt::decrypt($consultation_id)),
            'examen' => Examen_specialise::findOrFail(Crypt::decrypt($examen_id)),
        ]);
    }

    public function showExamSpecialResultatPDF($consultation_id, $examen_id, $i){
        try {
            $decrypted = Crypt::decrypt($consultation_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        $examen = Examen_specialise::findOrFail(Crypt::decrypt($examen_id));
        $resultat = json_decode($examen->resultat);
        return response()->file( public_path('storage/'.$resultat->pdf[$i-1]) );
    }

    // Examen spécialisé functions :: Files store function

    public function storeFiles(Request $request){
        $examen_id = $request->input('examen_id');
        $type = $request->input('type');
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
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => Crypt::encrypt($examen->consultation->id), 'examen_id' => Crypt::encrypt($examen->id) ]);

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
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => Crypt::encrypt($examen->consultation->id), 'examen_id' => Crypt::encrypt($examen->id) ]);

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
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => Crypt::encrypt($examen->consultation->id), 'examen_id' => Crypt::encrypt($examen->id) ]);

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
            return redirect()->route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => Crypt::encrypt($examen->consultation->id), 'examen_id' => Crypt::encrypt($examen->id) ]);
        }
    }
    public function storeInfo(Request $request, $id)
    {
        $cons = Consultation::findOrFail($id);

        if(!empty($request->input('histoire'))) $cons->histoire = $request->input('histoire');
        if(!empty($request->input('sd'))) $cons->strategie_diagnostique = $request->input('sd');
        if(!empty($request->input('dr'))) $cons->diagnostic_retenu = $request->input('dr');

        $cons->save();
        return redirect()->route('medecin.consultation.showInfo', [ 'id' => $id ]);
    }

    public function showEG($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-EG', [
            'consultation' => Consultation::findOrFail(Crypt::decrypt($id))
        ]);
    }

    public function storeEG(Request $request, $id)
    {
        $EG = new Examen_general();
        $EG->consultation_id = $id;
        $EG->etat = $request->input('etat');
        $EG->save();
        return redirect()->route('medecin.consultation.showEG', [ 'id' => Crypt::encrypt($id) ]);
    }

    public function updateEG(Request $request, $id, $c_id)
    {
        $EG = Examen_general::findOrFail($id);
        if(!empty($request->input('temperature'))) $EG->temperature = $request->input('temperature');
        if(!empty($request->input('ta'))) $EG->tension_arterielle = $request->input('ta');
        if(!empty($request->input('fc'))) $EG->frequence_cardiaque = $request->input('fc');
        if(!empty($request->input('fr'))) $EG->frequence_respiratoire = $request->input('fr');
        if(!empty($request->input('p'))) $EG->poids = $request->input('p');
        if(!empty($request->input('t'))) $EG->taille = $request->input('t');
        if(!empty($request->input('c'))) $EG->conjonctives = $request->input('c');
        if(!empty($request->input('autres'))) $EG->autre = json_encode($request->input('autres'));


        $EG->save();
        return redirect()->route('medecin.consultation.showEG', [ 'id' => $c_id ]);
    }

    /**************************************************************************
     * Ordonnance functions
     **************************************************************************
     */

    public function showOrdonnance($consultation_id)
    {
        try {
            $decrypted = Crypt::decrypt($consultation_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-ordonnance', [
            'consultation' => Consultation::findOrFail($decrypted)
        ]);
    }

    /**************************************************************************
     * Compte-rendu functions
     **************************************************************************
     */

    public function showCompteRendu($consultation_id)
    {
        try {
            $decrypted = Crypt::decrypt($consultation_id);
        }catch (DecryptException $e) {
            abort(404);
        }

        $text = "<p class=\"ql-align-right\"><strong>Le mercredi 29 avril 2020</strong></p><p><strong>Docteur ELGUEZDI Mohamed</strong></p><p><strong>Médecin Gastro-entérologie</strong></p><p><strong>6 PLACE TALHA. AGDAL, Rabat </strong></p><p><strong>0612345678</strong></p><p>&nbsp;</p><p><br></p><p><u>Patient</u></p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">CIN :</strong><span style=\"color: rgb(136, 136, 136);\"> </span>AA00001</p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Nom et prénom :</strong> IMZAGNAN Ilyas</p><p><u>Consultation</u></p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Numéro</strong><strong> :</strong> 23</p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Date :</strong> 28/04/2020</p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Motif :</strong><strong> </strong>Douleurs à l'estomac</p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Histoire de la maladie :</strong><span style=\"color: rgb(136, 136, 136);\"> </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Para-clinique (Examens complémentaire) :</strong></p><ol><li class=\"ql-indent-3\">Examen de type : <strong>Analyse biologique</strong> (numéro : 20)</li><li class=\"ql-indent-3\">Examen de type : <strong>Imagerie médicale</strong> (numéro : 21)</li><li class=\"ql-indent-3\">Examen de type : <strong>Analyse biologique</strong> (numéro : 22)</li></ol><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Diagnostic final :</strong><span style=\"color: rgb(136, 136, 136);\"> </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p><p class=\"ql-indent-2\"><strong style=\"color: rgb(136, 136, 136);\">Thérapeutique (Prescriptions médicamenteuses) :</strong></p><ol><li class=\"ql-indent-3\">DOLIPRANE VITAMINE C (500 / 150 MG / MG) (COMPRIME EFFERVESCENT), de 1 à 2 comprimé (Orale) tous les jours soire avant de dourmir, commençant 2020-04-25 pour 3 mois</li></ol><p><br></p>";

        return view('medecin.consultation.consultation-compte-rendu', [
            'consultation' => Consultation::findOrFail($decrypted),
            'generated_text' => $text
        ]);
    }

    public function submitCompteRendu(Request $request){
        $consultation = Consultation::findorFail($request->input('consultation_id'));

        $consultation->compte_rendu = $request->input('data-textarea');
        $consultation->save();

        Alert::success('Compte-rendu ajouté avec succès');
        return redirect()->route('medecin.consultation.showCompteRendu', [ 'consultation_id' => Crypt::encrypt($consultation->id) ]);
    }

    /**************************************************************************
     * Examen complémentaire functions
     **************************************************************************
     */

    public function showExamCompl($consultation_id)
    {
        try {
            $decrypted = Crypt::decrypt($consultation_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-examCompl', [
            'consultation' => Consultation::findOrFail($decrypted)
        ]);
    }

    public function createExamCompl($consultation_id)
    {
        try {
            $decrypted = Crypt::decrypt($consultation_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-examComplCreation', [
            'consultation' => Consultation::findOrFail($decrypted)
        ]);
    }

    public function showExamComplBilan($consultation_id, $examen_id)
    {
        try {
            $decrypted = Crypt::decrypt($consultation_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-examComplBilan', [
            'consultation' => Consultation::findOrFail(Crypt::decrypt($consultation_id)),
            'examen' => Examen_complimentaire::findOrFail(Crypt::decrypt($examen_id)),
        ]);
    }

    public function showExamComplResultat($consultation_id, $examen_id){
        try {
            $decrypted = Crypt::decrypt($consultation_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        return view('medecin.consultation.consultation-examComplResultat', [
            'consultation' => Consultation::findOrFail(Crypt::decrypt($consultation_id)),
            'examen' => Examen_complimentaire::findOrFail(Crypt::decrypt($examen_id)),
        ]);
    }

    public function showExamComplResultatPDF($consultation_id, $examen_id, $i){
        try {
            $decrypted = Crypt::decrypt($consultation_id);
            $decrypted = Crypt::decrypt($examen_id);
        }catch (DecryptException $e) {
            abort(404);
        }
        $examen = Examen_complimentaire::findOrFail(Crypt::decrypt($examen_id));
        $resultat = json_decode($examen->resultat);
        return response()->file( public_path('storage/'.$resultat->pdf[$i-1]) );
    }
}
