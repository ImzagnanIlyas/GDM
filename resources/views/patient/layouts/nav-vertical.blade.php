{{-- <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="padding-top: 4.375rem !important;">
    <div class="container-fluid d-flex flex-column p-0">
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="{{ route('ATCD') }}"><i class="far fa-clipboard"></i><span>Mon dossier médicale </span></a>
                <a class="nav-link" href="{{ route('profile') }}"><i class="far fa-id-badge"></i><span>Mon profil</span></a>
                <a class="nav-link" href="{{ route('mescon') }}"><i class="far fa-clipboard"></i><span>Mes consultations</span></a>
                <a class="nav-link active" href="index.html"></a>
                <a class="nav-link active" href="index.html"></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav> --}}






    @php
        $patient = Auth::guard('patient')->user();
    @endphp

<footer class="sticky-footer">
    <div class="d-flex justify-content-center" >
        <div class="card shadow border-info" style="width: 17rem; height: 4.1rem">
            <div class="card-body d-flex align-items-center p-0">
                <div class="row">
                    <div class="d-flex justify-content-start align-items-center ml-4">
                        <img class="img-circle" src="{{ asset('img/patient/consultation.png') }}"
                            style="width: 40px;border-radius: 50%;background-color: #90DFAA;">
                        <div class="ml-3">
                            <h5 class="text-info ">
                                Consultations ({{ $patient->consultations->count() }})
                            </h5>
                            <small class="text-dark">
                                Non terminée
                                ({{
                                    App\Consultation::where('patient_id', $patient->id)->whereNull('ordonnance')->count()
                                }})
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow border-info ml-3" style="width: 17rem; height: 4.1rem">
            <div class="card-body d-flex align-items-center p-0">
                <div class="row">
                    <div class="d-flex justify-content-start align-items-center ml-4">
                        <img class="img-circle" src="{{ asset('img/patient/ordonnance.png') }}"
                            style="width: 40px;border-radius: 50%;background-color: #90DFAA;">
                        <div class="ml-3">
                            <h5 class="text-info ">
                                Ordonnances
                                ({{ App\Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->count() }})
                            </h5>
                            <small class="text-dark">Non confirmée ({{ intdiv(App\Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->count(),2) }})</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow border-info ml-3" style="width: 17rem; height: 4.1rem">
            <div class="card-body d-flex align-items-center p-0">
                <div class="row">
                    <div class="d-flex justify-content-start align-items-center ml-4">
                        <img class="img-circle" src="{{ asset('img/patient/examen.png') }}"
                            style="width: 40px;border-radius: 50%;background-color: #90DFAA;">
                        <div class="ml-3">
                            <h5 class="text-info ">
                                @php
                                    $consultations =  App\Consultation::select('id')->where('patient_id',$patient->id)->get()->toArray();
                                @endphp
                                Examens
                                ({{ App\Examen_complimentaire::select('*')->whereIn('consultation_id' , array_values( $consultations))->count() }})
                            </h5>
                            <small class="text-dark">Non fait
                                ({{ App\Examen_complimentaire::select('*')->whereIn('consultation_id' , array_values( $consultations))->where('confirmation', false)->count() }})</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow border-info ml-3" style="width: 17rem; height: 4.1rem">
            <div class="card-body d-flex align-items-center p-0">
                <div class="row">
                    <div class="d-flex justify-content-start align-items-center ml-4">
                        <img class="img-circle" src="{{ asset('img/patient/medicament.png') }}"
                            style="width: 40px;border-radius: 50%;background-color: #90DFAA;">
                        <div class="ml-3">
                            <h5 class="text-info ">
                                Médicaments
                                ({{ App\Prescription_medicamenteuse::Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                                    ->Where('consultations.patient_id' , $patient->id)
                                    ->Where('confirmation', true)
                                    ->count()
                                }})
                            </h5>
                            <small class="text-dark">
                                Traitements chroniques
                                ({{ App\Prescription_medicamenteuse::Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                                    ->Where('consultations.patient_id' , $patient->id)
                                    ->Where('confirmation', true)
                                    ->Where('prescription_medicamenteuses.duree', '=', "chronique")
                                    ->count()
                                }})
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


{{-- <nav class="navbar navbar-dark align-items-center sidebar sidebar-dark bg-gradient-success p-0" style="margin-top: 5rem !important;min-height: 0vh;border-radius: 0px 20px 20px 0px;height: 22rem;">
    <div class="container-fluid d-flex flex-column p-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item col-9 @if($active === 'Antécédents') active-nav-item @endif" role="presentation">
                <a class="nav-link" href="{{ route('ATCD') }}">Antécédents</a>
</li>
<li class="nav-item col-9 @if($active === 'Biométrie') active-nav-item @endif" role="presentation">
    <a class="nav-link" href="{{ route('Bio') }}">Biométrie&nbsp;</a>
</li>
<li class="nav-item col-9 @if($active === 'Consultations-médicales') active-nav-item @endif" role="presentation">
    <a class="nav-link" href="{{ route('CM') }}">Consultations médicales</a>
</li>
<li class="nav-item col-9 @if($active === 'Ordonnances') active-nav-item @endif" role="presentation">
    <a class="nav-link" href="{{ route('Ord') }}">Ordonnances</a>
</li>
<li class="nav-item col-9 @if($active === 'Examens') active-nav-item @endif" role="presentation">
    <a class="nav-link" href="{{ route('Examens') }}">Examens</a>
</li>
<li class="nav-item col-9 @if($active === 'Problèmes') active-nav-item @endif" role="presentation">
    <a class="nav-link" href="{{ route('prblm') }}">Problèmes</a>
</li>
</ul>
</div>
</nav> --}}