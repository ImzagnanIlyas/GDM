<div>
    <div class="col-sm-8 col-md-12">
        <div class="card" style="border-radius: 20px;">
            <div class="card-block">
                <div class="col-lg-12">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img
                            class="media-object img-circle"
                            @if($patient->sexe === "Homme")
                            src="{{ asset('img/male.png') }}"
                            @else
                            src="{{ asset('img/female.png') }}"
                            @endif
                            style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                @if($patient->sexe === "Homme")
                                M.
                                @else
                                Mme.
                                @endif
                                {{ strtoupper($patient->nom) }}
                                {{ $patient->prenom }}
                            </h4>
                            <h5>{{ $patient->cin }} - {{ date("d/m/Y", strtotime($patient->ddn)) }}</h5>
                            <hr style="margin:8px auto">
                            <p>{{ strtoupper($patient->adresse) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8 col-md-12 m-0">
        <div class="card mb-0" style="border-radius: 20px; margin-bottom: 2px !important;">
            <h4 class="text-dark text-center">Examens complémentaires</h4>
        </div>
    </div>
    @if ($examens->isEmpty())
    <div class="col-sm-8 col-md-12">
        <div class="alert alert-warning mt-4" role="alert">
            Aucun examen saisi pour ce patient.
        </div>
    </div>
    @else
    <div class="col-sm-8 col-md-12">
        <div class="card" style="border-radius: 20px;">
            <div class="card-block">
                <div class="table-responsive table col-md-12 mt-4 overflow-auto">
                    <table class="table dataTable my-0">
                        <thead>
                            <tr>
                                <th class="col-2">Type</th>
                                <th class="col-2">Date</th>
                                <th class="col-1">Résultat</th>
                                <th class="col-3">Examinateur</th>
                                <th class="col-2">Date du résultat</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $examens as $EC )
                            <tr>
                                <td>{{ json_decode($EC->bilan)->type }}</td>
                                <td>{{ date("d/m/Y", strtotime($EC->created_at)) }}</td>
                                @if (! $EC->confirmation )
                                <td class="text-center" title="En attend"> <i class="fas fa-clock" style="color: orange;font-size: x-large;"></i> </td>
                                <td> - </td>
                                <td> - </td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('examinateur.showExamslBilan', [ 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-info col-6 mr-1">Bilan</a>
                                    <a href="{{ route('examinateur.showExamsAjoutResultat', [ 'examen_id' => Crypt::encrypt($EC->id), 'type' => 'text' ]) }}" class="btn btn-primary col-6 ml-1">Ajouter résultat</a>
                                </td>
                                @else
                                <td  class="text-center" title="Résultat ajouté"> <i class="fas fa-check-circle" style="color: green;font-size: x-large;"></i> </td>
                                <td> {{ $EC->examinateur->nom }}</td>
                                <td> {{ date("d/m/Y", strtotime($EC->updated_at)) }} </td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('examinateur.showExamslBilan', [ 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-info col-6 mr-1" >Bilan</a>
                                    <a href="{{ route('examinateur.showExamsResultat', [ 'examen_id' => Crypt::encrypt($EC->id) ]) }}" class="btn btn-primary col-6 ml-1">Voir résultat</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination p1 twelve">
    {{ $examens->links() }}
    </div>
    @endif
</div>
