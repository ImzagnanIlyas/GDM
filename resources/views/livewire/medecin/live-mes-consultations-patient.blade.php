<div>
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <p class="text-primary m-0 font-weight-bold">MES CONSULTATIONS POUR : {{ strtoupper($patient->nom).' '.strtoupper($patient->prenom) }} ({{ $patient->cin }})</p>
    </div>
    <div class="container">
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lieu</th>
                        <th>Motif</th>
                        <th>Date</th>
                        <th>Autres</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $consultations as $c )
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->lieu }}</td>
                        <td>{{ $c->motif }}</td>
                        <td>{{ $c->created_at }}</td>
                        <td><a href="{{ route('medecin.consultation.showExamSpecial', [ 'consultation_id' => Crypt::encrypt($c->id) ]) }}" class="btn btn-primary">Détails</a></td>
                    </tr>
                    @empty
                    <tr>
                        <div class="alert alert-warning" role="alert">
                            Vous n'avez effectué aucune consultation.
                        </div>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $consultations->links() }}
    </div>
</div>
