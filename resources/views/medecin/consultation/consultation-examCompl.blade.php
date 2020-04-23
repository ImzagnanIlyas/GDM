@extends('medecin.layouts.consultation-layout')

@section('title')
    Examen complémentaire
@endsection

@section('onglet')

@livewire('medecin.consultation.live-exam-compl', $consultation)

@endsection
