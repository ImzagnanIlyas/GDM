@extends('examinateur.layouts.examinateur_nav')

@section('title')
    Résultat de l'examen complémentaire
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('espace/examinateur/css/resultat.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
#quill-textarea{
    border: 1px solid gray;
}
    </style>
@endsection

@section('content')
    @php
        $resultat = json_decode($examen->resultat);
        $patient = $examen->consultation->patient;
    @endphp

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
                            <h5>{{ $patient->cin }} - {{ date("m/d/yy", strtotime($patient->ddn)) }}</h5>
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
                            <td>{{ $examen->created_at }}</td>
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
                            <td> {{ $examen->updated_at }} </td>
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
            <h4 class="text-dark text-center">Résultat</h4>
        </div>
    </div>
    <div class="col-sm-8 col-md-12">
        <div class="card" style="border-radius: 20px;">
            <div class="card-block">
                @if ( $resultat->type === 'text' )
                    <div class="col-md-10" style="margin: auto; float: none; padding-bottom: 1%">
                        <div class="card-body">
                            <div id="quill-textarea" style="color: black">
                                {!! $resultat->text !!}
                            </div>
                        </div>
                    </div>
                @elseif ( $resultat->type === 'pdf')
                    @php $i = 1; @endphp
                    <ul id="files">
                        @foreach ( $resultat->pdf as $pdf )
                            <li>
                                <a href="{{ route('examinateur.ExamsResultat.PDF', [ 'examen_id' => Crypt::encrypt($examen->id), 'i' => $i ]) }}" target="_blank" class="file_link">
                                    <div class="link_icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="details">
                                        <div class="application/pdf">
                                            <h4>PDF {{ $i }}</h4>
                                            <small><span class="file_size">{{  ceil(File::size(public_path('storage/'.$pdf))/(1024)) }} Ko</span></small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @php $i++; @endphp
                        @endforeach
                    </ul>
                @elseif ( $resultat->type === 'image')
                    <div class="tz-gallery">
                        <div class="row">
                            @foreach ( $resultat->image as $image )
                                <div class="col-sm-6 col-md-4">
                                    <a class="lightbox" href="{{ asset('storage/'.$image) }}">
                                        <img src="{{ asset('storage/'.$image) }}" alt="Resultat">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @elseif ( $resultat->type === 'video')
                    <div class="row justify-content-around">
                        @foreach ( $resultat->video as $video )
                            <div class="col-sm-6 col-md-6">
                                <video width="100%" controls>
                                    <source src="{{ asset('storage/'.$video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endforeach
                    </div>
                @elseif ( $resultat->type === 'audio')
                    @php $i = 1; @endphp
                    <ul id="audio" class="flex-column bd-highlight mb-3">
                        @foreach ( $resultat->audio as $audio )
                            <li>
                                <div class="audio_link">
                                    <div class="link_icon">
                                        <i class="fas fa-file-audio"></i>
                                    </div>
                                    <div class="details">
                                        <div class="application/pdf">
                                            <h4>Audio {{ $i }}</h4>
                                            <audio controls>
                                                <source src="{{ asset('storage/'.$audio) }}" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @php $i++; @endphp
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
        var toolbarOptions = [];
        var quill = new Quill('#quill-textarea', {
            readOnly: true,
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'bubble'
        });
    </script>

@endsection
