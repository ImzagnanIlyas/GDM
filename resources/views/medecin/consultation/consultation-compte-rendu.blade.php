@extends('medecin.layouts.consultation-layout')

@section('title')
    Compte-rendu
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
#quill-textarea2{
    border: 1px solid gray;
}
:required:valid {
  border-left-color: palegreen;
}
:required:invalid{
    border-left: 3px solid red;
}
input:required{
    border-left: 3px solid red;
}
    </style>
@endsection


@section('onglet')

@empty ($consultation->compte_rendu)
    @if( $consultation->medecin_id != Auth::guard('medecin')->user()->id )
        <div class="alert alert-warning text-center mt-4" role="alert">
            Pas de compte-rendu pour cette consultation.
        </div>
    @else
        <form class='form-row justify-content-center mt-2' method="POST" action="{{ route('medecin.consultation.submitCompteRendu') }}">
            @csrf
            <div class='form-group col-11' style="max-height: 300px;">
                <div id="quill-textarea" style="min-height: 200px;color: black;">
                    {!! $generated_text !!}
                </div>
                <textarea class='form-control' rows="5" id="data-textarea" name="data-textarea" type="textarea" hidden></textarea>
                <input role="CR" type="text" name="consultation_id" value="{{ $consultation->id }}" hidden>
            </div>
            <div class='form-group col-4 mt-5'>
                <button role="CR" type='submit' class='btn btn-primary btn-lg btn-block' onclick="$('#data-textarea').val($('.ql-editor').html());">Confirmer</button>
            </div>
        </form>
    @endif
@else
    <div class="col-md-10">
        <div class="card-body">
            <div id="quill-textarea2" style="color: black">
                {!! $consultation->compte_rendu !!}
            </div>
        </div>
    </div>
@endif

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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

        quill.on('text-change', function(){
            $('#data-textarea').val($(".ql-editor").html());
            //document.getElementById('myTextarea').value = $(".ql-editor").html();
        });
    </script>
    <script>
        var toolbarOptions2 = [];
        var quill2 = new Quill('#quill-textarea2', {
            readOnly: true,
            modules: {
                toolbar: toolbarOptions2
            },
            theme: 'bubble'
        });
    </script>
@endsection
