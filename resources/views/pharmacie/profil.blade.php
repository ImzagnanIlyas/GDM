@extends('pharmacie.layouts.pharmacie')

@section('title')
    Profil
@endsection



@section('css')

@livewireStyles
@endsection


@section('content')

@livewire('pharmacie.live-profil')

@endsection



@section('js')

@livewireScripts
@endsection
