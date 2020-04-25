@extends('medecin.layouts.m_layout')

@section('title')
    Liste des medicaments
@endsection

@section('content')
<style>
    .card {
      width: 100%;
    }
</style>
<div class="container">
    <div class="card shadow">
        @livewire('medecin.live-medicaments')
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('input[name="nom"]').change(function(){
            window.livewire.emit('search', this.value)
        });
    });
</script>
@endsection
