<div>
    <div class="col-sm-8 col-md-12 m-0">
        <div class="card mb-0">
            <h4 class="text-dark">Historique</h4>
            <input class="form-control col-3" type="text" placeholder="Rechercher par date" wire:model="searchInput" onfocus="(this.type='date')" onblur="(this.type='text')">
        </div>
    </div>
    <div class="col-sm-8 col-md-12">
    <div class="card">
        <div class="card-block">
            @if ($examens->isEmpty())
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
                            <th class="col-2">Type</th>
                            <th class="col-2">Date du résultat</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $examens as $EC )
                        <tr>
                            <td>{{ $EC->consultation->patient->cin }}</td>
                            <td> {{ strtoupper($EC->consultation->patient->nom) }} {{ $EC->consultation->patient->prenom }}</td>
                            <td>{{ json_decode($EC->bilan)->type }}</td>
                            <td> {{ $EC->updated_at }} </td>
                            <td class="d-flex justify-content-between">
                                <a href="{{ route('examinateur.showExamslBilan', [ 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-info col-6 mr-1" >Bilan</a>
                                <a href="{{ route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-primary col-6 ml-1">Résultat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
