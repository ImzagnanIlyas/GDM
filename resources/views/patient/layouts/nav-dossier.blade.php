
{{-- @php
    use Illuminate\Support\Facades\Request;
    $active = Request::segment(2);
@endphp

<nav class="navbar navbar-dark navbar-expand bg-success justify-content-center" style="margin-top: 6rem !important">
    <ul class="nav navbar-nav">
        <li class="nav-item @if($active === 'Antécédents') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('ATCD') }}">Antécédents</a>
        </li>
        <li class="nav-item @if($active === 'Biométrie') active-nav-item @endif" role="presentation">
            <a class="nav-link" href="{{ route('Bio') }}">Biométrie&nbsp;</a>
        </li>
        <li class="nav-item @if($active === 'Consultations-médicales') active-nav-item @endif" role="presentation">
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
</nav> --}}

@php
    use Illuminate\Support\Facades\Request;
    $active = Request::segment(2);
@endphp

<style>
    .active-nav-item{
        border-radius: 0px 20px 20px 0px;
        -moz-border-radius: 0px 20px 20px 0px;
        -webkit-border-radius: 20px 20px 20px 20px;
        border: 1px solid #ffffff;
        background-color: white;
    }
    .active-nav-item a{
        color: #36cc7a !important;
    }
</style>
<div class="d-flex justify-content-center col-12 mb-3" style="margin-top: 6rem !important">
<div class="container my-auto">
    <nav class="navbar navbar-dark navbar-expand bg-success justify-content-center rounded">
        <ul class="nav navbar-nav">
            <li class="nav-item @if($active === 'Antécédents') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('ATCD') }}">Antécédents</a>
            </li>
            <li class="nav-item @if($active === 'Biométrie') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('Bio') }}">Biométrie&nbsp;</a>
            </li>
            <li class="nav-item @if($active === 'Consultations-médicales') active-nav-item @endif" role="presentation">
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
</div>
</div>
