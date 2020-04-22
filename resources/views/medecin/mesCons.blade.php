@extends('medecin.layouts.m_layout')

@section('title')
    Mes consultations
@endsection

@section('content')
<style>
    .card {
      width: 100%;
    }
</style>
<div class="container">
    <div class="card shadow">
        @livewire('medecin.live-mes-consultations')
    </div>
</div>
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
