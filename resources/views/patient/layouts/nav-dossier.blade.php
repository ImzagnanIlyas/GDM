@php
    use Illuminate\Support\Facades\Request;
    $active = Request::segment(2);
@endphp

<style>
    .active-nav-item{
        border-radius: 0px 50px 50px 50px;
        -moz-border-radius: 0px 50px 50px 50px;
        -webkit-border-radius: 0px 0px 20px 20px;
        border: 1px solid #ffffff;
        background-color: white;
    }
    .active-nav-item a{
        color: #36cc7a !important;
    }
</style>

<nav class="navbar navbar-dark navbar-expand bg-success  justify-content-center">
    <ul class="nav navbar-nav">
        <li class="nav-item @if($active === 'Antécédents') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('ATCD') }}">Antécédents</a>
        </li>
        <li class="nav-item @if($active === 'Biométrie') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('Bio') }}">Biométrie&nbsp;</a>
        </li>
        <li class="nav-item @if($active === 'Consultations_médicales') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('CM') }}">Consultations médicales</a>
        </li>
        <li class="nav-item @if($active === 'Ordonnances') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('Ord') }}">Ordonnances</a>
        </li>
        <li class="nav-item @if($active === 'Examens') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('Examens') }}">Examens</a>
        </li>
        <li class="nav-item @if($active === 'Problèmes') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('prblm') }}">Problèmes</a>
        </li>
    </ul>
</nav>
