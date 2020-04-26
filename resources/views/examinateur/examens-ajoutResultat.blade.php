@extends('examinateur.layouts.examinateur_nav')

@section('title')
    Ajouter le résultat pour l'examen complémentaire
@endsection

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @livewireStyles
    <style>
.loading-div{
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: rgb(0,0,0);
    background: linear-gradient(0deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100%);
}
.loading-div p{
    color: #fff;
    font-size: 30px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-top: -28px;
    margin-left: -100px;
}
#loading-center-absolute {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 180px;
    width: 180px;
    margin-top: -90px;
    margin-left: -90px;
}
#upload #loading-center-absolute {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 400px;
    width: 400px;
    margin-top: -200px;
    margin-left: -200px;
}

.object {
    position: absolute;
    border: 4px solid #fff;
    opacity: 1;
    border-radius: 50%;
    animation: double-spin 1.5s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}

.object:nth-child(2) {
    animation-delay: -0.5s;
}

#upload .object {
    position: absolute;
    border: 4px solid #fff;
    opacity: 1;
    border-radius: 50%;
    animation: double-spin-upload 1.5s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}

#upload .object:nth-child(2) {
    animation-delay: -0.5s;
}

@keyframes double-spin {
    0% {
        top: 90px;
        left: 90px;
        width: 0;
        height: 0;
        opacity: 1;
    }
    100% {
        top: 0;
        left: 0;
        width: 180px;
        height: 180px;
        opacity: 0;
    }
}

@keyframes double-spin-upload {
    0% {
        top: 100px;
        left: 100px;
        width: 200px;
        height: 200px;
        opacity: 1;
    }
    100% {
        top: 0;
        left: 0;
        width: 400px;
        height: 400px;
        opacity: 0;
    }
}


#loader-container {
  width: 300px;
  height: 300px;
  color: white;
  margin: 0 auto;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
  border: 5px solid #3498db;
  border-radius: 50%;
  -webkit-animation: borderScale 1s infinite ease-in-out;
  animation: borderScale 1s infinite ease-in-out;
}

#loadingText {
  font-family: 'Raleway', sans-serif;
  font-weight: bold;
  font-size: 2em;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
}

@-webkit-keyframes borderScale {
  0% {
    border: 5px solid white;
  }
  50% {
    border: 25px solid #3498db;
  }
  100% {
    border: 5px solid white;
  }
}

@keyframes borderScale {
  0% {
    border: 5px solid white;
  }
  50% {
    border: 25px solid #3498db;
  }
  100% {
    border: 5px solid white;
  }
}
.upload{
    border-radius: 20px 20px 20px 20px;
    -moz-border-radius: 20px 20px 20px 20px;
    -webkit-border-radius: 20px 20px 20px 20px;
    border: 2px solid #bfbfbf;; padding: 1%
}
    </style>
@endsection

@section('content')

@livewire('examinateur.live-examen-ajout-resultat', $examen)

@endsection

@section('js')
    @livewireScripts
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var toolbarOptions = [
            [{ 'font': [] }],
            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ 'align': [] }],

            ['link', 'blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }   ],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

            ['clean']                                         // remove formatting button
        ];

        var quill = new Quill('#quill-textarea', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        window.livewire.on('quill', function() {
            var quill = new Quill('#quill-textarea', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
            });
        });

        quill.on('text-change', function(){
            $('#data-textarea').val($(".ql-editor").html());
            //document.getElementById('myTextarea').value = $(".ql-editor").html();
        });

    </script>
@endsection
