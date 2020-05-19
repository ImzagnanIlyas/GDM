<div>
    <div class="loading-div" wire:loading>
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>
    <div id="upload" class="loading-div" style="visibility: hidden">
        <p>Téléchargement</p>
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>
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
            <h4 class="text-dark text-center">Examen complémentaire sélectionné</h4>
        </div>
    </div>
    <div class="col-sm-8 col-md-12">
        <div class="card" style="border-radius: 20px;">
            <div class="card-block">
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

                        <tr>
                            <td>{{ json_decode($examen->bilan)->type }}</td>
                            <td>{{ date("d/m/Y", strtotime($examen->created_at)) }}</td>
                            @if (! $examen->confirmation )
                            <td class="text-center" title="En attend"> <i class="fas fa-clock" style="color: orange;font-size: x-large;"></i> </td>
                            <td> - </td>
                            <td> - </td>
                            <td class="d-flex justify-content-between">
                                <a href="{{ route('examinateur.showExamslBilan', [ 'examen_id' => Crypt::encrypt($examen->id) ]) }}" class="btn btn-info col-6 mr-1">Bilan</a>
                            </td>
                            @else
                            <td  class="text-center" title="Résultat ajouté"> <i class="fas fa-check-circle" style="color: green;font-size: x-large;"></i> </td>
                            <td> {{ $examen->examinateur->nom }}</td>
                            <td> {{ date("d/m/Y", strtotime($examen->updated_at)) }} </td>
                            <td class="d-flex justify-content-between">
                            <a href="{{ route('examinateur.showExamslBilan', [ 'examen_id' => Crypt::encrypt($examen->id) ]) }}" class="btn btn-info col-6 mr-1">Bilan</a>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-md-12 m-0">
        <div class="card mb-0" style="border-radius: 20px; margin-bottom: 2px !important;">
            <h4 class="text-dark text-center">Ajouter le résultat</h4>
        </div>
    </div>
    <div class="col-sm-8 col-md-12">
        <div class="card" style="border-radius: 20px;">
            <div class="card-block">
                <div class="col-md-4" style="margin: auto; float: none; padding-bottom: 1%">
                    <select class="form-control" name="Type" wire:model="select">
                        <option name="Type" value="text">Text libre</option>
                        <option name="Type" value="pdf">Fichiers PDF</option>
                        <option name="Type" value="image">Fichiers Image</option>
                        <option name="Type" value="video">Fichiers Video</option>
                        <option name="Type" value="audio">Fichiers Audio</option>
                    </select>
                </div>
                <div class="col-md-11" style="margin: auto; float: none; padding-bottom: 1%">
                    @if ( $type === "text" )
                    <form class='custom-form' wire:submit.prevent="submitText(Object.fromEntries(new FormData($event.target)))">
                        <div class='form-group overflow-auto' style="max-height: 500px">
                            <div id="quill-textarea" style="height: 200px; color: black;">
                            </div>
                        </div>
                        <textarea rows="5" id="data-textarea" name="data-textarea" type="textarea" hidden></textarea>
                        <button type='submit' class='btn btn-primary btn-lg btn-block'>Confirmer</button>
                    </form>
                    @elseif ( $type === "pdf" )
                    <form method="POST" action="{{ route('examinateur.Exams.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
                        @csrf
                        <div class="form-group upload">
                            <label for="files">Sélectionner un ou plusieurs fichiers</label>
                            <input type="file" class="form-control-file" name="data[]" multiple>
                            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
                            <input type="text" name="type" value="{{ $type }}" hidden>
                        </div>
                        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
                    </form>
                    @elseif ( $type === "image" )
                    <form method="POST" action="{{ route('examinateur.Exams.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
                        @csrf
                        <div class="form-group upload">
                            <label for="files">Sélectionner un ou plusieurs fichiers</label>
                            <input type="file" class="form-control-file" name="data[]" multiple>
                            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
                            <input type="text" name="type" value="{{ $type }}" hidden>
                        </div>
                        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
                    </form>
                    @elseif ( $type === "video" )
                    <form method="POST" action="{{ route('examinateur.Exams.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
                        @csrf
                        <div class="form-group upload">
                            <label for="files">Sélectionner un ou plusieurs fichiers</label>
                            <input type="file" class="form-control-file" name="data[]" multiple>
                            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
                            <input type="text" name="type" value="{{ $type }}" hidden>
                        </div>
                        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
                    </form>
                    @elseif ( $type === "audio" )
                    <form method="POST" action="{{ route('examinateur.Exams.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
                        @csrf
                        <div class="form-group upload">
                            <label for="files">Sélectionner un ou plusieurs fichiers</label>
                            <input type="file" class="form-control-file" name="data[]" multiple>
                            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
                            <input type="text" name="type" value="{{ $type }}" hidden>
                        </div>
                        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
