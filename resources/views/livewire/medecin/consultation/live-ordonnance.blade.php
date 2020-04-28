<div class="col-md-12 mt-3">

@if ($ajout)
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form class='form-row' wire:submit.prevent="storePM(Object.fromEntries(new FormData($event.target)))">
        @csrf

        <div class="form-group col-8">
            <label for="voie">Liste des médicaments</label> @if ($errors->has('med')) <i class="fas fa-exclamation-circle" style="color: red"></i> @endif
            <select class="js-example-basic-single" name="medicament" style="width: 100%;" required>
                <option></option>
                @foreach ($medicaments as $medicament)
                    <option name="medicament" value="{{ $medicament->id }}">{{ $medicament->nom }} ({{ $medicament->dosage }}{{ $medicament->unite_dosage }}) ({{ $medicament->forme }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-4">
            <label for="voie">Voie(s) d’administration</label>
            <input type="text" class="form-control" name="voie" required>
        </div>

        <div class="form-group col-6">
            <label for="dose">Posologie</label>
            <input type="text" class="form-control" name="dose" placeholder="Exemple : 2 comprimé | de 1 à 2 comprimé" required>
        </div>

        <div class="form-group col-6">
            <label for="rythme">Rythme</label>
            <input type="text" class="form-control" name="rythme" placeholder="Exemple : tous les jours, matin, avant le repas | tous les 8 heurs, après le repas" required>
        </div>

        <div class="form-group col-6">
            <label for="ddd">Date de début</label>
            <input type="date" class="form-control" name="ddd" required>
        </div>

        <div class="form-group col-6">
            <label for="duree">Durée</label>
            <input type="text" class="form-control" name="duree" placeholder="Exemple : pour 1 mois | chronique" required>
            <small class="form-text text-muted">Si le traitement est chronique, écrivez le mot clé "chronique" ci-dessus.</small>
        </div>

        <div class="form-group col-12">
            <label for="commentaire">Commentaire</label>
            <textarea type="text" class="form-control" name="commentaire"></textarea>
        </div>

        <div class="form-row col-12">
            <button type='submit' onclick="$('.toto').val($('.js-example-basic-single option:selected').val());" class='btn btn-primary btn-lg btn-block mt-2 mr-1 col'>Ajouter</button>
            <button wire:click='switchAjout(false)' type='button' class='btn btn-primary btn-lg btn-block mt-2 ml-1 col'>Annuler</button>
        </div>
    </form>


@else
    <div class="col-md-12 d-flex justify-content-between">
        <span>
            <h5>Les prescriptions médicamenteuses</h5>
            <small class="text-muted mt-0">Note bien que les prescriptions sont stockées temporairement si vous n'avez pas confirmé l'ordonnance. Donc si vous actualisez ou quittez la page vous perdra les données.</small>
        </span>
        <button wire:click="switchAjout(true)" class='btn btn-primary'>Ajouter</button>
    </div>
    @empty ($pms)
        <div class="alert alert-warning mt-4" role="alert">
            Aucune prescription pour cette ordonnance.
        </div>
    @else
    <div class="table-responsive table col-md-12 mt-4 overflow-auto" style="max-height: 305px">
        <table class="table dataTable my-0">
            <thead>
                <tr>
                    <th>Médicament</th>
                    <th>Voie(s)</th>
                    <th>Posologie</th>
                    <th>Rythme</th>
                    <th>Date de début</th>
                    <th>Durée</th>
                    <th>Commentaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $pms as $key => $pm )
                    <tr>
                        <td>{{ App\Medicament::find($pm['medicament_id'])->nom }}</td>
                        <td>{{ $pm['voie'] }}</td>
                        <td>{{ $pm['dose'] }}</td>
                        <td>{{ $pm['rythme'] }}</td>
                        <td>{{ $pm['date_debut'] }}</td>
                        <td>{{ $pm['duree'] }}</td>
                        <td title="{{ $pm['commentaire'] }}">{{ substr( $pm['commentaire'], 0, 50 ) }}...</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty

    <hr class="mt-5 mb-5">

    <div class="col-md-12 d-flex justify-content-start">
        <h5>Ordonnance</h5>
    </div>
    <form class='form-row justify-content-center mt-2' wire:submit.prevent="confirmer(Object.fromEntries(new FormData($event.target)))">
        <div class='form-group col-12'>
            <div id="quill-textarea" style="min-height: 200px; color: black;" @empty ($pms) disabled @endempty>
                {!! $ordonnance !!}
            </div>
            <textarea class='form-control' rows="5" id="data-textarea" name="data-textarea" type="textarea" hidden></textarea>
        </div>
        <div class='form-group col-6 mt-5'>
            <button type='submit' class='btn btn-primary btn-lg btn-block' onclick="$('#data-textarea').val($('.ql-editor').html());" @empty ($pms) disabled @endempty>Confirmer</button>
        </div>
    </form>

@endif

</div>
