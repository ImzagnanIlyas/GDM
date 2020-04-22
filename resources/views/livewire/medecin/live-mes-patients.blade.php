<div>
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <p class="text-primary m-0 font-weight-bold">MES PATIENTS</p>
        <div class="input-group col-3">
            <input class="form-control" type="text" placeholder="Rechercher par CIN" wire:model="searchInput">
        </div>
    </div>
    <div class="container">
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>CIN</th>
                        <th class="col-3">Nom et prenom</th>
                        <th>sexe</th>
                        <th class="text-center">Nombre de consultations</th>
                        <th>Date de la dernière consultation</th>
                        <th>Autres</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $patients as $patient )
                    <tr>
                        <td>{{ $patient->cin }}</td>
                        <td>{{ strtoupper($patient->nom).' '.$patient->prenom }}</td>
                        <td class="text-center">{{ $patient->sexe }}</td>
                        <td class="text-center">{{ $patient->consultations->where('medecin_id', $medecin->id)->count() }}</td>
                        <td>{{ $patient->consultations->where('medecin_id', $medecin->id)->sortByDesc('created_at')->first()->created_at }}</td>
                        <td><a href="" class="btn btn-primary">Profil</a></td>
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
        {{ $patients->links() }}
    </div>
</div>
