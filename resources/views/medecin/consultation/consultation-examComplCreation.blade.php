@extends('medecin.layouts.consultation-layout')

@section('title')
    Ajouter un examen complémentaire
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
fieldset{
    border-radius: 15px;
    padding: inherit;
    margin: inherit;
    border: inherit;
    border-left-style: none;
    border-right-style: none;
    border-bottom-style: none;
}
    </style>
@endsection

@section('onglet')

@livewire('medecin.consultation.live-create-exam-compl', $consultation)

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="analyseBasique[]"], select[name="analyseAutre[]"], select[name="IMexamen[]"]').select2({
                placeholder: "Sélectionner un/plusieurs examen(s)",
            });
        });

        document.addEventListener("livewire:load", function(event) {
            window.livewire.hook('afterDomUpdate', () => {
                $('select[name="analyseBasique[]"], select[name="analyseAutre[]"], select[name="IMexamen[]"]').select2({
                    placeholder: "Sélectionner un/plusieurs examen(s)",
                });
            });
        });

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

        window.livewire.on('quill', empty => {
            var quill = new Quill('div[name="quill-textarea"]', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
            });

            if (empty) {
                quill.enable(false);
            }

            quill.on('text-change', function(){
                $('textarea[name="data-textarea"]').val($(".ql-editor").html());
                //document.getElementById('myTextarea').value = $(".ql-editor").html();
            });
        });

    </script>
@endsection

