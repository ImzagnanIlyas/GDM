@extends('medecin.layouts.dossier_layout')

@section('onglet')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
#quill-textarea2{
    border: 1px solid gray;
}
</style>

<div class="d-flex justify-content-center mt-2"">
    <div class="col-md-10">
        <div class="card-body">
            <div id="quill-textarea2" style="color: black">
                {!! $consultation->ordonnance !!}
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
