@php
    use Illuminate\Support\Facades\Request;
    $active = Request::segment(2);
    $patient = Auth::guard('patient')->user();
@endphp



<!-- <nav class="navbar navbar-dark navbar-expand bg-success justify-content-center" style="margin-top: 6rem !important">
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
</nav> -->

<div class="d-flex justify-content-center col-12 mb-3" style="margin-top: 6rem !important">
    <div class="card shadow border-info" style="width: 17rem; height: 4.1rem">
        <div class="card-body d-flex align-items-center p-0">
            <div class="row">
                <div class="d-flex justify-content-start align-items-center ml-4">
                    <img
                    class="img-circle"
                    src="{{ asset('img/medecin/male.png') }}"
                    style="width: 40px;border-radius: 50%;background-color: #90DFAA;"
                    >
                    <div class="ml-3">
                        <h5 class="text-info font-weight-bold">
                            Consultations ({{ $patient->consultations->count() }})
                        </h5>
                        <small class="text-dark">Non terminée (1)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow border-info ml-3" style="width: 17rem; height: 4.1rem">
        <div class="card-body d-flex align-items-center p-0">
            <div class="row">
                <div class="d-flex justify-content-start align-items-center ml-4">
                    <img
                    class="img-circle"
                    src="{{ asset('img/medecin/male.png') }}"
                    style="width: 40px;border-radius: 50%;background-color: #90DFAA;"
                    >
                    <div class="ml-3">
                        <h5 class="text-info font-weight-bold">
                            Ordonnance ({{ App\Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->count() }})
                        </h5>
                        <small class="text-dark">Non confirmée (0)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow border-info ml-3" style="width: 17rem; height: 4.1rem">
        <div class="card-body d-flex align-items-center p-0">
            <div class="row">
                <div class="d-flex justify-content-start align-items-center ml-4">
                    <img
                    class="img-circle"
                    src="{{ asset('img/medecin/male.png') }}"
                    style="width: 40px;border-radius: 50%;background-color: #90DFAA;"
                    >
                    <div class="ml-3">
                        <h5 class="text-info font-weight-bold">
                            Examens (5)
                        </h5>
                        <small class="text-dark">Non fait (2)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow border-info ml-3" style="width: 17rem; height: 4.1rem">
        <div class="card-body d-flex align-items-center p-0">
            <div class="row">
                <div class="d-flex justify-content-start align-items-center ml-4">
                    <img
                    class="img-circle"
                    src="{{ asset('img/medecin/male.png') }}"
                    style="width: 40px;border-radius: 50%;background-color: #90DFAA;"
                    >
                    <div class="ml-3">
                        <h5 class="text-info font-weight-bold">
                            Médicaments (10)
                        </h5>
                        <small class="text-dark">Traitements chroniques (1)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
