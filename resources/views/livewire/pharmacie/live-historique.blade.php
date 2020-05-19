<div>
    <div class="col-sm-8 col-md-12 m-0" style="margin-bottom: 1px !important">
        <div class="card mb-0" style="display: flex;flex-direction: row;justify-content: flex-start;border-radius: 100px">
            <h4 class="text-dark" style="width: 60%;margin: 3%;">Historique</h4>
            <input class="form-control" style="width: 30%;margin: auto;" type="text" placeholder="Rechercher par date" wire:model="searchInput" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
    </div>
    <div class="col-sm-8 col-md-12">
    <div class="card" style="border-radius: 20px">
        <div class="card-block">
            @if ($ordonnances->isEmpty())
            <div class="col-sm-8 col-md-12">
                <div class="alert alert-warning mt-4 text-center" role="alert">
                    Aucun résultat.
                </div>
            </div>
            @else
            <div class="table-responsive table col-md-12 mt-4 overflow-auto">
                <table class="table dataTable my-0">
                    <thead>
                        <tr>
                            <th class="col-2">CIN</th>
                            <th class="col-2">Patient</th>
                            <th class="col-2">Médecin</th>
                            <th class="col-2">Date</th>
                            <th class="col-2">Ordonnances</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $ordonnances as $tmp )
                        <tr>
                            <td>{{ $tmp->patient->cin }}</td>
                            <td>{{ strtoupper($tmp->patient->nom) }} {{ $tmp->patient->prenom }}</td>
                            <td>{{ strtoupper($tmp->medecin->patient->nom) }} {{ $tmp->medecin->patient->prenom }}</td>
                            <td> {{ date("d/m/Y", strtotime($tmp->PMs->first()->created_at)) }} </td>
                            <td class="d-flex justify-content-between text-center">
                                <a href="{{ route('pharmacie.ordonnance', ['id' => Crypt::encrypt($tmp->patient->id)]) }}" class="btn btn-info col-6 mr-1" ><i class="fas fa-file-alt"></i></a></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="pagination p1 twelve pb-0">
                {{ $ordonnances->links() }}
            </div>
        </div>
    </div>
</div>
