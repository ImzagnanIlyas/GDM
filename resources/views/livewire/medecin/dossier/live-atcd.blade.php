<div style="height: 400px">
    @if ($n == 1)
        {{-- medicament --}}
        <div class="col-md-12 d-flex justify-content-between align-items-center mt-2">
            <h4 class="text-dark">Médicament(s)</h4>
            <input class="form-control col-3" type="text" placeholder="Rechercher par médicament" wire:model="searchInput">
        </div>
        @if ( empty($data) )
            <div class="alert alert-warning text-center mt-4" role="alert">
                Les données n'existent pas pour ce patient.
            </div>
        @else
            <table class="table mt-2">
                <head>
                    <tr>
                        <th>Nom médicament</th>
                        <th>Dose</th>
                        <th>Rythme</th>
                        <th>Date Début</th>
                        <th>Durée</th>
                        <th>Commentaire</th>
                    </tr>
                </head>
                <body>
                    @foreach ($data as $pres)
                        <tr>
                            <td>{{$pres->nom}}</td>
                            <td>{{$pres->dose}}</td>
                            <td>{{$pres->rythme}}</td>
                            <td>{{ date('d/m/Y',strtotime($pres->date_debut)) }}</td>
                            <td>{{$pres->duree}}</td>
                            <td>{{$pres->commentaire}}</td>
                        </tr>
                    @endforeach
            </table>
            <hr>
            <div class="d-flex justify-content-center">
                {{ $data->links() }}
            </div>
        @endif
    @elseif ($n == 2)
        {{-- habitude --}}
        <div class="col-md-12 d-flex justify-content-between mt-2">
            <h4 class="text-dark">Habitude(s)</h4>
            <input class="form-control col-3" type="text" placeholder="Rechercher par date" wire:model="searchInput" onfocus="(this.type='date')" onblur="(this.type='text')">
            @if(!$add)
                <button class="btn btn-success" wire:click="switchAdd" title="Ajouter un examen complémentaire"> <i class="fas fa-plus" style="width: 80px"></i> </button>
            @else
                <button class="btn btn-success" onclick="event.preventDefault(); document.getElementsByClassName('addHabitude').submit();" title="Confirmer">Confirmer</button>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-2">
            <table class="table">
                <head>
                    <tr>
                        <th class="col-1">Date</th>
                        <th class="col-3">Sport</th>
                        <th class="col-2">Alimentation</th>
                        <th class="col-2">Tabac</th>
                        <th class="col-2">Alcool</th>
                        <th class="col-2">Autre</th>
                    </tr>
                </head>
                <body>
                @if($add)
                    <form class="addHabitude" wire:submit.prevent="addHabitude(Object.fromEntries(new FormData($event.target)))">
                    <tr>
                        <td><input class="form-control" type="date"></td>
                        <td><input class="form-control" type="text"></td>
                        <td><input class="form-control" type="text"></td>
                        <td>
                            <select name="etat" class="form-control " required>
                                <option selected disabled></option>
                                <option>Non fumeur</option>
                                <option>Passif</option>
                                <option>Fumeur actuellement</option>
                            </select>
                        </td>
                        <td><input class="form-control" type="text"></td>
                        <td><input class="form-control" type="text"></td>
                    </tr>
                    </form>
                @endif
                @foreach ($data as $habitude)
                    <tr>
                        <td>{{ date('d/m/Y',strtotime($habitude->date)) }}</td>
                        <td>{{ $habitude->sport }}</td>
                        <td>{{ $habitude->alimentation }}</td>
                        <td>{{ $habitude->tabac }}</td>
                        <td>{{ $habitude->alcool }}</td>
                        <td>{{ $habitude->autre }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($n == 3)
        {{-- chirurgicaux --}}
        <div class="col-md-12 d-flex justify-content-between mt-2">
            <h4 class="text-dark">Chirurgicaux</h4>
            <input class="form-control col-3" type="text" placeholder="Rechercher par nom" wire:model="searchInput">
        </div>
        @if ( empty($data) )
            <div class="alert alert-warning text-center mt-4" role="alert">
                Les données n'existent pas pour ce patient.
            </div>
        @else
            <div class="d-flex justify-content-center mt-2">
                <table class="table">
                    <head>
                        <tr>
                            <th>Nom d'opération</th>
                            <th class="col-5">Description</th>
                            <th>Date</th>
                            <th>Consultation liée</th>
                        </tr>
                    </head>
                    <body>
                    @foreach ($data as $ch)
                        <tr>
                            <td>{{ $ch->operation }}</td>
                            <td>{{ $ch->description }}</td>
                            <td>{{ date('d/m/Y', strtotime($ch->date_operation)) }}</td>
                            <td><a href="{{ route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($ch->id_consultation) ]) }}" class="btn btn-info col-6 mr-1" ><i class="fas fa-external-link-alt"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    @elseif ($n == 4)
        {{-- Gynéco --}}
        <table class="table" style="margin: 15px;margin-left: 10px;">
            <head>
                <tr>
                    <th>Ménarches</th>
                    <th>Ménopause</th>
                    <th>Cycle</th>
                    <th>Gestation</th>
                    <th></th>
                </tr>
            </head>
            <body>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

        </table>
    @endif
</div>
