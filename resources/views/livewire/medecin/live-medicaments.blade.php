<div>
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <p class="text-primary m-0 font-weight-bold">LISTE DES MEDICAMENTS</p>
        <div class="input-group col-3">
            <input class="form-control" type="text" placeholder="Rechercher par nom" wire:model="searchInput">
        </div>
    </div>
    <div class="container">
        <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
            <table class="table dataTable my-0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>DCI</th>
                        <th>Dosage</th>
                        <th>Forme</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $medicaments as $m )
                    <tr>
                        <td>{{ $m->code }}</td>
                        <td>{{ $m->nom }}</td>
                        <td>{{ $m->dci }}</td>
                        <td>{{ $m->dosage }} {{ $m->unite_dosage  }}</td>
                        <td>{{ $m->forme }}</td>
                    </tr>
                    @empty
                    <tr>
                        <div class="alert alert-warning" role="alert">
                            Médicament non trouvé.
                        </div>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $medicaments->links() }}
    </div>
</div>
