@extends('medecin.layouts.m_layout')

@section('title')
    Mes Patients
@endsection

@section('style')
<style>
    .card {
      width: 100%;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="card shadow">
        @livewire('medecin.live-mes-patients')
    </div>
</div>

@endsection
