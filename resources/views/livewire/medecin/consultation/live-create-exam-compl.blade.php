<div class="col-md-12">

    <fieldset>
        <legend>Type d'examen complémentaire</legend>
        <div class="form-group row justify-content-center">
            <label for="type[]" class="col-1 col-form-label">Type</label>
            <select class="form-control col-4" name="type[]" required wire:model="examentype">
                <option name="type[]" value="." selected hidden>Sélectionner le type</option>
                <option name="type[]" value="AB">Analyse biologique</option>
                <option name="type[]" value="IM">Imagerie médicale</option>
                <option name="type[]" value="Autre">Autre</option>
            </select>
        </div>
    </fieldset>
@if ( $examentype === 'AB' )
    <fieldset>
        <legend>Les analyses biologiques</legend>
        <div class="form-group row justify-content-center">
            <label for="analyseBasique[]" class="col-1 col-form-label">Basique</label>
            <select class="js-example-basic-single col-10" name="analyseBasique[]" multiple required>
                <option name="analyseBasique[]" value=""></option>
                <optgroup label="Hématologie">
                    <option name="analyseBasique[]" value="Groupe sanguin, rhésus et phénotypage">Groupe sanguin, rhésus et phénotypage</option>
                    <option name="analyseBasique[]" value="NFS">NFS</option>
                    <option name="analyseBasique[]" value="Hémoglobine">Hémoglobine</option>
                    <option name="analyseBasique[]" value="Hématocrite">Hématocrite</option>
                    <option name="analyseBasique[]" value="Volume globulaire moyen (VGM)">Volume globulaire moyen (VGM)</option>
                    <option name="analyseBasique[]" value="Réticulocyte">Réticulocyte</option>
                    <option name="analyseBasique[]" value="Schizocyte">Schizocyte</option>
                    <option name="analyseBasique[]" value="Plaquettes">Plaquettes</option>
                    <option name="analyseBasique[]" value="Vitesse de sédimentation (VS)">Vitesse de sédimentation (VS)</option>
                    <option name="analyseBasique[]" value="RAI (Recherche d'anticorps irréguliers)">RAI (Recherche d'anticorps irréguliers)</option>
                    <option name="analyseBasique[]" value="Test de Coombs direct">Test de Coombs direct</option>
                    <option name="analyseBasique[]" value="Test de Coombs indirect">Test de Coombs indirect</option>
                </optgroup>
                <optgroup label="Gerinnung">
                    <option name="analyseBasique[]" value="Temps de Prothrombine">Temps de Prothrombine</option>
                    <option name="analyseBasique[]" value="TCA">TCA</option>
                    <option name="analyseBasique[]" value="Temps de Quick">Temps de Quick</option>
                    <option name="analyseBasique[]" value="INR">INR</option>
                </optgroup>
                <optgroup label="Électrolytes">
                    <option name="analyseBasique[]" value="Natrémie">Natrémie</option>
                    <option name="analyseBasique[]" value="Kaliémie">Kaliémie</option>
                    <option name="analyseBasique[]" value="Chlorémie">Chlorémie</option>
                    <option name="analyseBasique[]" value="Calcémie">Calcémie</option>
                    <option name="analyseBasique[]" value="Calcium ionisé">Calcium ionisé</option>
                    <option name="analyseBasique[]" value="Phosphatémie">Phosphatémie</option>
                    <option name="analyseBasique[]" value="Osmolalité plasmatique">Osmolalité plasmatique</option>
                    <option name="analyseBasique[]" value="Lactates">Lactates</option>
                    <option name="analyseBasique[]" value="Dioxide de Carbone (CO2)">Dioxide de Carbone (CO2)</option>
                </optgroup>
                <optgroup label="Fonction rénale">
                    <option name="analyseBasique[]" value="Acide urique">Acide urique</option>
                    <option name="analyseBasique[]" value="Urée">Urée</option>
                    <option name="analyseBasique[]" value="Créatinine et calcul de la clearance de la créatinine">Créatinine et calcul de la clearance de la créatinine</option>
                </optgroup>
                <optgroup label="Protéines">
                    <option name="analyseBasique[]" value="Protéine sérique totale">Protéine sérique totale</option>
                    <option name="analyseBasique[]" value="Albumine">Albumine</option>
                    <option name="analyseBasique[]" value="Électrophorèse des protéines sériques">Électrophorèse des protéines sériques</option>
                    <option name="analyseBasique[]" value="C-Reactive Protein (CRP)">C-Reactive Protein (CRP)</option>
                </optgroup>
                <optgroup label="Fonction hépatique">
                    <option name="analyseBasique[]" value="ALAT (TGP)">ALAT (TGP)</option>
                    <option name="analyseBasique[]" value="ASAT (TGO)">ASAT (TGO)</option>
                    <option name="analyseBasique[]" value="Gamma Glutamyl Transpeptidase (GGT)">Gamma Glutamyl Transpeptidase (GGT)</option>
                    <option name="analyseBasique[]" value="Lipase">Lipase</option>
                    <option name="analyseBasique[]" value="Amylase">Amylase</option>
                    <option name="analyseBasique[]" value="Bilirubine totale">Bilirubine totale</option>
                    <option name="analyseBasique[]" value="Bilirubine conjuguée">Bilirubine conjuguée</option>
                    <option name="analyseBasique[]" value="Bilirubine libre">Bilirubine libre</option>
                    <option name="analyseBasique[]" value="Ammoniémie">Ammoniémie</option>
                    <option name="analyseBasique[]" value="Anticorps anti-Hepatite A">Anticorps anti-Hepatite A</option>
                    <option name="analyseBasique[]" value="Anticorps anti-Hépatite B">Anticorps anti-Hépatite B</option>
                    <option name="analyseBasique[]" value="Antigènes anti-Hépatite B S (anti-HBs)">Antigènes anti-Hépatite B S (anti-HBs)</option>
                    <option name="analyseBasique[]" value="Anticorps anti-Hépatite C">Anticorps anti-Hépatite C</option>
                    <option name="analyseBasique[]" value="Charge virale Hépatite C viral load">Charge virale Hépatite C viral load</option>
                    <option name="analyseBasique[]" value="Anticorps anti-Hépatite D">Anticorps anti-Hépatite D</option>
                    <option name="analyseBasique[]" value="Anticorps anti-Hépatite E">Anticorps anti-Hépatite E</option>
                </optgroup>
                <optgroup label="Métabolisme">
                    <option name="analyseBasique[]" value="Glycémie">Glycémie</option>
                    <option name="analyseBasique[]" value="Glycohemoglobin (GHB)">Glycohemoglobin (GHB)</option>
                    <option name="analyseBasique[]" value="Hémoglobine A1c (HbA1C)">Hémoglobine A1c (HbA1C)</option>
                    <option name="analyseBasique[]" value="C-Peptidémie">C-Peptidémie</option>
                    <option name="analyseBasique[]" value="Cholestérol total">Cholestérol total</option>
                    <option name="analyseBasique[]" value="HDL Cholestérol">HDL Cholestérol</option>
                    <option name="analyseBasique[]" value="LDL Cholestérol">LDL Cholestérol</option>
                    <option name="analyseBasique[]" value="VLDL Cholestérol">VLDL Cholestérol</option>
                    <option name="analyseBasique[]" value="Triglycerides">Triglycerides</option>
                    <option name="analyseBasique[]" value="Lipoprotéine (a)">Lipoprotéine (a)</option>
                    <option name="analyseBasique[]" value="Microalbuminurie">Microalbuminurie</option>
                </optgroup>
            </select>
        </div>

        <div class="form-group row justify-content-center">
            <label for="analyseAutre[]" class="col-1 col-form-label">Autre</label>
            <select class="js-example-basic-single col-10" name="analyseAutre[]" multiple required>
                <option name="analyseAutre[]" value=""></option>
                <optgroup label="Marqueurs tumoraux">
                    <option name="analyseAutre[]" value="ACE">ACE</option>
                    <option name="analyseAutre[]" value="AFP">AFP</option>
                    <option name="analyseAutre[]" value="CA 125">CA 125</option>
                    <option name="analyseAutre[]" value="CA 15-3">CA 15-3</option>
                    <option name="analyseAutre[]" value="CA 19-9">CA 19-9</option>
                    <option name="analyseAutre[]" value="CA 27.29">CA 27.29</option>
                    <option name="analyseAutre[]" value="CYFRA 21-1">CYFRA 21-1</option>
                    <option name="analyseAutre[]" value="bêta HCG">bêta HCG</option>
                </optgroup>
                <optgroup label="Bilan martial">
                    <option name="analyseAutre[]" value="Ferritine">Ferritine</option>
                    <option name="analyseAutre[]" value="Capacité total de fixation du fer (CTF)">Capacité total de fixation du fer (CTF)</option>
                    <option name="analyseAutre[]" value="Fer sérique">Fer sérique</option>
                    <option name="analyseAutre[]" value="Coefficient de saturation de la sidérophiline">Coefficient de saturation de la sidérophiline</option>
                </optgroup>
                <optgroup label="Prostate">
                    <option name="analyseAutre[]" value="Prostate-Specific Antigen (PSA)">Prostate-Specific Antigen (PSA)</option>
                    <option name="analyseAutre[]" value="Dihydrotestostérone (DHT)">Dihydrotestostérone (DHT)</option>
                    <option name="analyseAutre[]" value="Prostatic acid phosphatase (PAP)">Prostatic acid phosphatase (PAP)</option>
                </optgroup>
                <optgroup label="Vitamines">
                    <option name="analyseAutre[]" value="Vitamine B1 (thiamine)">Vitamine B1 (thiamine)</option>
                    <option name="analyseAutre[]" value="Vitamine B12 (cyanocobalamine)">Vitamine B12 (cyanocobalamine)</option>
                    <option name="analyseAutre[]" value="1, 25 Hydroxy Vitamine D">1, 25 Hydroxy Vitamine D</option>
                    <option name="analyseAutre[]" value="25-Hydroxy Vitamine D">25-Hydroxy Vitamine D</option>
                    <option name="analyseAutre[]" value="Folates érythrocytaires">Folates érythrocytaires</option>
                    <option name="analyseAutre[]" value="Folates sériques">Folates sériques</option>
                </optgroup>
                <optgroup label="Thyroïde">
                    <option name="analyseAutre[]" value="TSH ultra-sensible">TSH ultra-sensible</option>
                    <option name="analyseAutre[]" value="FT3">FT3</option>
                    <option name="analyseAutre[]" value="FT4">FT4</option>
                    <option name="analyseAutre[]" value="Anticorps anti-Thyroïde Péroxidase (anti-TPO)">Anticorps anti-Thyroïde Péroxidase (anti-TPO)</option>
                    <option name="analyseAutre[]" value="Anticorps anti-Thyroglobuline">Anticorps anti-Thyroglobuline</option>
                    <option name="analyseAutre[]" value="Anticorps sélectif dirigé contre le récepteur TSH (anti-TSHR-Ab)">Anticorps sélectif dirigé contre le récepteur TSH (anti-TSHR-Ab)</option>
                    <option name="analyseAutre[]" value="Thyroid Stimulating Immunoglobulin (TSI)">Thyroid Stimulating Immunoglobulin (TSI)</option>
                    <option name="analyseAutre[]" value="Parathormone (PTH), Intacte">Parathormone (PTH), Intacte</option>
                    <option name="analyseAutre[]" value="Parathormone (PTH), RP">Parathormone (PTH), RP</option>
                </optgroup>
                <optgroup label="Maladie de Biermer">
                    <option name="analyseAutre[]" value="Gastrinémie">Gastrinémie</option>
                    <option name="analyseAutre[]" value="Anticorps sériques anti-facteur intrinsèque">Anticorps sériques anti-facteur intrinsèque</option>
                    <option name="analyseAutre[]" value="Anticorps anti-cellules pariétales gastriques">Anticorps anti-cellules pariétales gastriques</option>
                    <option name="analyseAutre[]" value="Test de Schilling">Test de Schilling</option>
                </optgroup>
                <optgroup label="Sérologies">
                    <option name="analyseAutre[]" value="Anticorps Maladie de Lyme, IgM">Anticorps Maladie de Lyme, IgM</option>
                    <option name="analyseAutre[]" value="Western blot, Maladie de Lyme, Serum">Western blot, Maladie de Lyme, Serum</option>
                    <option name="analyseAutre[]" value="Sérologie VIH">Sérologie VIH</option>
                    <option name="analyseAutre[]" value="Profil immunitaire pour Measles, Mumps, Rubella (MMR)">Profil immunitaire pour Measles, Mumps, Rubella (MMR)</option>
                    <option name="analyseAutre[]" value="Status immunitaire Hepatitis B (anticorps anti-HbS)">Status immunitaire Hepatitis B (anticorps anti-HbS)</option>
                    <option name="analyseAutre[]" value="PCR Epstein-Barr Virus (EBV), Qualitatif">PCR Epstein-Barr Virus (EBV), Qualitatif</option>
                    <option name="analyseAutre[]" value="MIN test, Qualitatif">MIN test, Qualitatif</option>
                    <option name="analyseAutre[]" value="Anticorps anti Cytomegalovirus (CMV), IgG">Anticorps anti Cytomegalovirus (CMV), IgG</option>
                    <option name="analyseAutre[]" value="Sérologie Parvovirus B19">Sérologie Parvovirus B19</option>
                    <option name="analyseAutre[]" value="Anticorps anti Rubella, IgG">Anticorps anti Rubella, IgG</option>
                    <option name="analyseAutre[]" value="Anticorps anti Rubéole, IgG">Anticorps anti Rubéole, IgG</option>
                    <option name="analyseAutre[]" value="Ancticorps anti Toxoplasma Gondii, IgG">Ancticorps anti Toxoplasma Gondii, IgG</option>
                    <option name="analyseAutre[]" value="Tetanus Antibodies Profile">Tetanus Antibodies Profile</option>
                    <option name="analyseAutre[]" value="Anticorps anti-VZV, IgG">Anticorps anti-VZV, IgG</option>
                    <option name="analyseAutre[]" value="West Nile Virus, PCR">West Nile Virus, PCR</option>
                    <option name="analyseAutre[]" value="Syphilis - Rapid Plasma Reagin (RPR)">Syphilis - Rapid Plasma Reagin (RPR)</option>
                    <option name="analyseAutre[]" value="Test à l'urée - Helicobacter pylori">Test à l'urée - Helicobacter pylori</option>
                </optgroup>
                <optgroup label="Polyarthrite rhumatoïde">
                    <option name="analyseAutre[]" value="Facteur Rhumatoïde (RF)">Facteur Rhumatoïde (RF)</option>
                    <option name="analyseAutre[]" value="Anticorps anti-CCP">Anticorps anti-CCP</option>
                    <option name="analyseAutre[]" value="Anticorps antinucléaires (AAN)">Anticorps antinucléaires (AAN)</option>
                </optgroup>
            </select>
            <button class='btn btn-primary mt-3 col-2' onclick="window.livewire.emit('AB', $('select[name=\'analyseBasique[]\']').val(), $('select[name=\'analyseAutre[]\']').val() );">Générer</button>
        </div>
    </fieldset>

    <fieldset>
        <legend>Prescription d'examen</legend>
        <form class='form-row justify-content-center mt-2' wire:submit.prevent="confirmer(Object.fromEntries(new FormData($event.target)))">
            <div class='form-group col-12'>
                <div name="quill-textarea" style="min-height: 200px; color: black;" @empty ($prescription) disabled @endempty>
                    {!! $prescription !!}
                </div>
                <textarea class='form-control' rows="5" name="data-textarea" type="textarea" hidden></textarea>
            </div>
            <div class='form-group col-6 mt-5'>
                <button type='submit' class='btn btn-primary btn-lg btn-block' onclick="$('textarea[name=\'data-textarea\']').val($('.ql-editor').html());" @empty ($prescription) disabled @endempty>Confirmer</button>
            </div>
        </form>
    </fieldset>

@elseif ( $examentype === 'IM' )
    <fieldset>
        <legend>Les examens par l'imagerie médicale</legend>
        <div class="form-group row justify-content-center">
            <label for="IMtype[]" class="col-1 col-form-label">Type</label>
            <select class="form-control col-10" name="IMtype[]" required wire:model="imtype">
                <option name="IMtype[]" value="." selected hidden>Sélectionner le type</option>
                <option name="IMtype[]" value="Radiographie">Radiographie</option>
                <option name="IMtype[]" value="Echographie">Echographie</option>
                <option name="IMtype[]" value="IRM">Imagerie par Résonance Magnétique (IRM)</option>
                <option name="IMtype[]" value="Scanner">Scanner</option>
                <option name="IMtype[]" value="Endoscopie">Endoscopie</option>
                <option name="IMtype[]" value="Scintigraphie">Scintigraphie</option>
            </select>
        </div>
        <div class="form-group row justify-content-center">
            <label for="IMexamen[]" class="col-1 col-form-label">Examen</label>
            <select class="js-example-basic-single col-10" name="IMexamen[]" multiple required @empty($imtype) disabled @endempty>
                <option name="IMexamen[]" value=""></option>
                @forelse ($im_examen as $data)
                <option name="IMexamen[]" value="{{ $data }}">{{ $data }}</option>
                @empty
                @endforelse
            </select>
            <button class='btn btn-primary mt-3 col-2' onclick="window.livewire.emit('IM', $('select[name=\'IMexamen[]\']').val() );">Générer</button>
        </div>
    </fieldset>

    <fieldset>
        <legend>Prescription d'examen</legend>
        <form class='form-row justify-content-center mt-2' wire:submit.prevent="confirmer(Object.fromEntries(new FormData($event.target)))">
            <div class='form-group col-12'>
                <div name="quill-textarea" style="min-height: 200px; color: black;" @empty ($prescription) disabled @endempty>
                    {!! $prescription !!}
                </div>
                <textarea class='form-control' rows="5" name="data-textarea" type="textarea" hidden></textarea>
            </div>
            <div class='form-group col-6 mt-5'>
                <button type='submit' class='btn btn-primary btn-lg btn-block' onclick="$('textarea[name=\'data-textarea\']').val($('.ql-editor').html());" @empty ($prescription) disabled @endempty>Confirmer</button>
            </div>
        </form>
    </fieldset>

@elseif ( $examentype === 'Autre' )
    <fieldset>
        <legend>Prescription d'examen</legend>
        <form class='form-row justify-content-center mt-2' wire:submit.prevent="confirmer(Object.fromEntries(new FormData($event.target)))">
            <div class="form-group col-12">
                <input type="text" class="form-control col-6" name="autretype" wire:model="autretype" placeholder="Spécifier le type ici" required>
            </div>
            <div class='form-group col-12'>
                <div name="quill-textarea" style="min-height: 200px; color: black;" >
                    {!! $prescription !!}
                </div>
                <textarea class='form-control' rows="5" name="data-textarea" type="textarea" hidden></textarea>
            </div>
            <div class='form-group col-6 mt-5'>
                <button type='submit' class='btn btn-primary btn-lg btn-block' onclick="$('textarea[name=\'data-textarea\']').val($('.ql-editor').html());">Confirmer</button>
            </div>
        </form>
    </fieldset>
@endif


    <button wire:click="do">do</button>
</div>
