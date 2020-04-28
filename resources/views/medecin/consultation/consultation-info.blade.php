@extends('medecin.layouts.consultation-layout')

@section('title')
    Générale
@endsection

@section('onglet')
<table style="width:60%">
    <tr>
        <th>Médecin:</th>
        <td>{{ $consultation->medecin->patient->nom }} {{ $consultation->medecin->patient->prenom }}</td>
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
                <form method="POST" action="{{ route('medecin.consultation.storeInfo', [ 'id' => $consultation->id ]) }}" class="form-inline">
                    @csrf
                    <input type="text" name="histoire" id="histoire" class="form-control" aria-describedby="helpId">
                    <button class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
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
                <form method="POST" action="{{ route('medecin.consultation.storeInfo', [ 'id' => $consultation->id ]) }}" class="form-inline">
                    @csrf
                    <input type="text" name="sd" id="sd" class="form-control" aria-describedby="helpId">
                    <button class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
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
                <form method="POST" action="{{ route('medecin.consultation.storeInfo', [ 'id' => $consultation->id ]) }}" class="form-inline">
                    @csrf
                    <input type="text" name="dr" id="dr" class="form-control" aria-describedby="helpId">
                    <button class="btn btn-primary" type="submit"><i class="far fa-check-circle"></i></button>
                </form>
            @else
                {{ $consultation->diagnostic_retenu }}
            @endif
        </td>
    </tr>
  </table>
@endsection
