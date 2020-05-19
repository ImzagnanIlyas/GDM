@extends('medecin.layouts.consultation-layout')

@section('title')
    Examen général
@endsection

@section('onglet')

<style>
    th, td {
        padding: 15px;
    }
    select {
        padding: 8px;
        width: 300px;
}
</style>

@if ( empty($consultation->EG->id) )

    @if( $consultation->medecin_id != Auth::guard('medecin')->user()->id )
        <div class="alert alert-warning text-center mt-4" role="alert">
            Pas d'examen général pour cette consultation.
        </div>
    @else

        <div class="col-12 d-flex flex-column align-items-center">
            <p class="">Pas d'examen général pour cette consultation. Sélectionnez l'état du patient pour lancer un nouvel examen général.</p>
            <table style="width: 40%">
                <tr>
                    <th>État général:</th>
                    <form method="POST" action="{{ route('medecin.consultation.storeEG', [ 'id' => $consultation->id ]) }}" class="form-inline">
                        @csrf
                        <td>
                            <select name="etat" class="form-control " required>
                                <option selected="yes"></option>
                                <option>Bon</option>
                                <option>Assez bon</option>
                                <option>Mauvais</option>
                            </select>
                        </td>
                        <td>
                            <button role="edit" class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    @endif

@else
    <table style="width:60%">
        <tr>
            <th>État général:</th>
            <td>
                {{ $consultation->EG->etat }}
            </td>
        </tr>
        <form method="POST" action="{{ route('medecin.consultation.updateEG', [ 'id' => $consultation->EG->id, 'c_id' => $consultation->id ]) }}" class="form-inline">
            @csrf
        <tr>
            <th>Température en degrés Celsius (°C):</th>
            <td>
                @if ( empty($consultation->EG->temperature) )
                        <input role="edit" type="number" name="temperature" id="temperature" min="1" max="100" class="form-control">
                @else
                    {{ $consultation->EG->temperature }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Tension artérielle en millimètre de mercure (mmHg):</th>
            <td>
                @if ( empty($consultation->EG->tension_arterielle) )

                        <input role="edit" type="text" name="ta" id="ta" class="form-control">


                @else
                    {{ $consultation->EG->tension_arterielle }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Fréquence cardiaque en Battements par minute (B/min):</th>
            <td>
                @if ( empty($consultation->EG->frequence_cardiaque) )

                        <input role="edit" type="number" name="fc" id="fc" min="0" max="100" class="form-control">
                @else
                    {{ $consultation->EG->frequence_cardiaque }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Fréquence respiratoire en Cycles par minute (C/min)</th>
            <td>
                @if ( empty($consultation->EG->frequence_respiratoire) )

                        <input role="edit" type="number" name="fr" id="fr" min="0" max="100" class="form-control">

                @else
                    {{ $consultation->EG->frequence_respiratoire }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Poids en kilogrammes (Kg)</th>
            <td>
                @if ( empty($consultation->EG->poids) )

                        <input role="edit" type="number" name="p" id="p" min="0" max="1000" class="form-control">

                @else
                    {{ $consultation->EG->poids }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Taille en centimètres (cm)</th>
            <td>
                @if ( empty($consultation->EG->taille) )

                        <input role="edit" type="number" name="t" id="t" min="0" max="300" class="form-control">

                @else
                    {{ $consultation->EG->taille }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Conjonctives:</th>
            <td>
                @if ( empty($consultation->EG->conjonctives) )
                        <select role="edit" name="c">
                            <option selected="yes"></option>
                            <option>Normalement colorées</option>
                            <option>Légèrement décolorées</option>
                            <option>Décolorées</option>
                            <option>Autres</option>
                        </select>
                @else
                    {{ $consultation->EG->conjonctives }}
                @endif
            </td>
        </tr>
        <tr>
            <th>Autres:</th>
            <td>
                @if ( empty($consultation->EG->autre) )

                        <textarea role="edit" name="autres" id="autres" class="form-control"></textarea>

                @else
                    {{ $consultation->EG->autre }}
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <button role="edit" class="btn btn-primary" type="submit">Valider</button>
            </td>
        </tr>
        </form>
    </table>
@endif

{{-- <table style="width:60%">
    <tr>
        <th>Etat</th>
        <td>{{ $consultation->medecin_id }}</td>
    </tr>
    <tr>
        <th>Date de création:</th>
        <td>{{ $consultation->date }}</td>
    </tr>
    <tr>
        <th>Lieu:</th>
        <td>{{ $consultation->lieu }}</td>
    </tr>
    <tr>
        <th>Motif:</th>
        <td>{{ $consultation->motif }}</td>
    </tr>
    <tr>
        <th>Histoire:</th>
        <td>
            @if ( empty($consultation->histoire) )
                <form method="POST" action="{{ route('medecin.consultation.storeHist', [ 'id' => $consultation->id ]) }}" class="form-inline">
                    @csrf
                    <input role="edit" type="text" name="histoire" id="histoire" class="form-control" aria-describedby="helpId">
                    <button role="edit" class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
                </form>
            @else
                {{ $consultation->histoire }}
            @endif
        </td>
    </tr>
    <tr>
        <th>Strategie diagnostique:</th>
        <td>
            @if ( empty($consultation->strategie_diagnostique) )
                <form method="POST" action="{{ route('medecin.consultation.storeSD', [ 'id' => $consultation->id ]) }}" class="form-inline">
                    @csrf
                    <input role="edit" type="text" name="sd" id="sd" class="form-control" aria-describedby="helpId">
                    <button role="edit" class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
                </form>
            @else
                {{ $consultation->strategie_diagnostique }}
            @endif
        </td>
    </tr>
    <tr>
        <th>Diagnostique retenue:</th>
        <td>
            @if ( empty($consultation->diagnostic_retenu) )
                <form method="POST" action="{{ route('medecin.consultation.storeDR', [ 'id' => $consultation->id ]) }}" class="form-inline">
                    @csrf
                    <input role="edit" type="text" name="dr" id="dr" class="form-control" aria-describedby="helpId">
                    <button role="edit" class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
                </form>
            @else
                {{ $consultation->diagnostic_retenu }}
            @endif
        </td>
    </tr>
  </table> --}}
@endsection
