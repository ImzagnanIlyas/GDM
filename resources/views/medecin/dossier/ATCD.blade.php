@extends('medecin.layouts.dossier_layout')

@section('onglet')

@livewire('medecin.dossier.live-atcd', $patient, $n)

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('input[name="date"]').change(function(){
            window.livewire.emit('search', this.value)
        });
    });
</script>
@endsection
