@extends('pharmacie.layouts.pharmacie')

@section('title')
    Profil
@endsection



@section('css')

@livewireStyles
@endsection


@section('content')

@livewire('patient.live-profil')

@endsection



@section('js')

@livewireScripts
@endsection
