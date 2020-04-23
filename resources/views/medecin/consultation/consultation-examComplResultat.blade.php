@extends('medecin.layouts.consultation-layout')

@section('title')
    Résultat de l'examen complémentaire
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('css/resultat.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
#quill-textarea{
    border: 1px solid gray;
}
    </style>
@endsection

@section('onglet')
    @php
        $resultat = json_decode($examen->resultat);
    @endphp

    <div class="col-md-12">
        <h2>Résultat de l'examen num : {{ $examen->id }}</h2>
        <hr>
    </div>

    @if ( $resultat->type === 'text' )
        <div class="col-md-10">
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
                    <a href="{{ route('medecin.consultation.ExamComplResultat.PDF', [ 'consultation_id' => Crypt::encrypt($consultation->id), 'examen_id' => Crypt::encrypt($examen->id), 'i' => $i ]) }}" target="_blank" class="file_link">
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
