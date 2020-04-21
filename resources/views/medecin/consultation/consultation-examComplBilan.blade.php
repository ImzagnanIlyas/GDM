@extends('medecin.layouts.consultation-layout')

@section('style')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
#quill-textarea{
    border: 1px solid gray;
}
    </style>
@endsection


@section('onglet')

<div class="col-md-10">
    <div class="card-body">
        <div id="quill-textarea" style="color: black">
            {!! json_decode($examen->bilan)->text !!}
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions2 = [];
        var quill2 = new Quill('#quill-textarea', {
            readOnly: true,
            modules: {
                toolbar: toolbarOptions2
            },
            theme: 'bubble'
        });
    </script>
@endsection
