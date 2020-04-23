@extends('medecin.layouts.consultation-layout')

@section('title')
    Examen spécialisé
@endsection

@section('onglet')

@livewire('medecin.consultation.live-exam-special', $consultation)

@endsection
