<div>
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <p class="text-primary m-0 font-weight-bold">MES CONSULTATIONS</p>
        <div class="input-group col-3">
            <input class="form-control" type="text" placeholder="Rechercher par date" wire:model="searchInput" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
    </div>
    <div class="container">
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="col-2">Nom du patient</th>
                        <th>Lieu</th>
                        <th>Motif</th>
                        <th>Date</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $consultations as $c )
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ strtoupper($c->patient->nom).' '.$c->patient->prenom }}</td>
                        <td>{{ $c->lieu }}</td>
                        <td>{{ $c->motif }}</td>
                        <td>{{ $c->date }}</td>
                        <td><a href="{{ route('medecin.consultation.showInfo', ['id' => Crypt::encrypt($c->id) ]) }}" class="btn btn-primary">Afficher</a></td>
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
