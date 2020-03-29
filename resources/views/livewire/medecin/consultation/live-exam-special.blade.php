<div class="col-md-12">

    <div class="col-sm-8 col-md-12">
        <div class="row justify-content-between px-2">
            <h4 class="text-dark">Examens spécialisés</h4>
            <button class="btn btn-success" wire:click="showCreateForm"> <i class="fas fa-plus" style="width: 80px"></i> </button>
        </div>
    </div>
    <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 305px">
        <table class="table dataTable my-0">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Resultat</th>
                    <th>Date de la resultat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $consultation->ESs as $ES )
                <tr>
                    <td>{{ $ES->nom }}</td>
                    <td>{{ $ES->created_at }}</td>
                    @if ( empty($ES->resultat) )
                    <td> <i class="fas fa-thumbs-down" style="color: red;"></i> </td>
                    <td> - </td>
                    <td>
                        <a href="{{ route('medecin.consultation.showExamSpecialAjoutResultat', [ 'consultation_id' => $consultation->id, 'examen_id' => $ES->id, 'type' => 'text' ]) }}" class="btn btn-primary">Ajouter resultat</a>
                    </td>
                    @else
                    <td> <i class="fas fa-thumbs-up" style="color: green;"></i> </td>
                    <td> {{ $ES->updated_at }} </td>
                    <td>
                        <a href="{{ route('medecin.consultation.showExamSpecialResultat', [ 'consultation_id' => $consultation->id, 'examen_id' => $ES->id ]) }}" class="btn btn-primary">Voir resultat</a>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <div class="alert alert-warning" role="alert">
                        Aucun examen pour cette consultation.
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
