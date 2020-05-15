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
                        <th class="text-center">CIN</th>
                        <th class="col-2 text-center">Nom et prenom</th>
                        <th class="text-center">Sexe</th>
                        <th class="text-center">Nombre de consultations</th>
                        <th class="text-center">Date de la dernière consultation</th>
                        <th class="text-center">Dossier médical</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $patients as $patient )
                    <tr>
                        <td class="text-center">{{ $patient->cin }}</td>
                        <td class="text-center">{{ strtoupper($patient->nom).' '.$patient->prenom }}</td>
                        <td class="text-center">{{ $patient->sexe }}</td>
                        <td class="text-center"><a href="{{ route('medecin.mesConsultationsPatient', [ 'patient_id' => Crypt::encrypt($patient->id) ]) }}">{{ $patient->consultations->where('medecin_id', $medecin->id)->count() }}</a></td>
                        <td class="text-center">{{ date('d/m/Y',strtotime($patient->consultations->where('medecin_id', $medecin->id)->sortByDesc('created_at')->first()->created_at)) }}</td>
                        <td class="text-center"><a href="{{ route('medecin.dossier.ATCD', ['patient_id' => Crypt::encrypt($patient->id), 'n' => 1]) }}" class="btn btn-primary">Afficher</a></td>
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
