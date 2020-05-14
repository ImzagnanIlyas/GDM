<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/untitled.css') }}">
    <style>

        #timedate {
          color: black;
          border-left: 3px solid #555dfb;
          padding-left: 10%;
          float: right;
        }
    </style>
</head>

@php
    use App\Examen_complimentaire;
    use App\Consultation;
    use App\Examen_general;
    use App\Examen_specialise;
    use App\Prescription_medicamenteuse;


    $patient = Auth::guard('patient')->user();
@endphp

<body id="page-top">

        <div class="d-flex flex-column" >
        @include('patient.layouts.nav-horizontal')
            <div class="container" style="margin-top: 6rem !important">
                <div class="card shadow border-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-primary">
                                <p class="card-text " style="font-size: 32px;">
                                    Bonjour
                                    @if($patient->sexe === "Homme")
                                    M.
                                    @else
                                    Mme.
                                    @endif

                                    {{ $patient->nom }} {{ $patient->prenom }}
                                </p>
                            </div>
                            <div class="col-auto">
                                <p id="timedate">{{ date("d-m-Y") }} {{ date("H:i") }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-group mt-5">
                    <div class="card shadow border-left-success border-success py-2 mr-2">
                        <div class="card-body d-flex align-items-center p-0">
                            <div class="row">
                                <div class="d-flex justify-content-start align-items-center ml-4">
                                    <img class="img-circle" src="{{ asset('img/patient/consultation.png') }}"
                                        style="width: 100px;border-radius: 50%;background-color: #90DFAA;">
                                    <div class="text-uppercase ml-3">
                                        <h2 class="text-success">
                                            Consultations ({{ $patient->consultations->count() }})
                                        </h2>
                                        <small class="text-dark">
                                            Non terminée
                                            ({{
                                                Consultation::where('patient_id', $patient->id)->whereNull('ordonnance')->count()
                                            }})
                                        </small>
                                    </div>
                                    <a href="{{ route('CM') }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow border-left-success border-success py-2 ml-2">
                        <div class="card-body d-flex align-items-center p-0">
                            <div class="row">
                                <div class="d-flex justify-content-start align-items-center ml-4">
                                    <img class="img-circle" src="{{ asset('img/patient/ordonnance.png') }}"
                                        style="width: 100px;border-radius: 50%;background-color: #90DFAA;">
                                    <div class="text-uppercase ml-3">
                                        <h2 class="text-success">
                                            Ordonnances
                                            ({{ Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->count() }})
                                        </h2>
                                        <small class="text-dark">Non confirmée ({{ intdiv(Consultation::where('patient_id', $patient->id)->whereNotNull('ordonnance')->count(),2) }})</small>
                                    </div>
                                    <a href="{{ route('Ord') }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-group mt-2">
                    <div class="card shadow border-left-success border-success py-2 mr-2">
                        <div class="card-body d-flex align-items-center p-0">
                            <div class="row">
                                <div class="d-flex justify-content-start align-items-center ml-4">
                                    <img class="img-circle" src="{{ asset('img/patient/examen.png') }}"
                                        style="width: 100px;border-radius: 50%;background-color: #90DFAA;">
                                    <div class="text-uppercase ml-3">
                                        <h2 class="text-success">
                                            @php
                                                $consultations =  Consultation::select('id')->where('patient_id',$patient->id)->get()->toArray();
                                                $collection = collect();
                                                foreach ($patient->consultations as $consultation) {
                                                    foreach ($consultation->ECs as $EC) {
                                                        $collection->add($EC);
                                                    }
                                                }
                                            @endphp
                                            Examens ({{ $collection->count() }})
                                        </h2>
                                        <small class="text-dark">Non fait
                                            ({{ Examen_complimentaire::select('*')->whereIn('consultation_id' , array_values( $consultations))->where('confirmation', false)->count() }})
                                        </small>
                                    </div>
                                    <a href="{{ route('Examens') }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow border-left-success border-right-success border-success py-2 ml-2">
                        <div class="card-body d-flex align-items-center p-0">
                            <div class="row">
                                <div class="d-flex justify-content-start align-items-center ml-4">
                                    <img class="img-circle" src="{{ asset('img/patient/medicament.png') }}"
                                        style="width: 100px;border-radius: 50%;background-color: #90DFAA;">
                                    <div class="text-uppercase ml-3">
                                        <h2 class="text-success">
                                            Médicaments
                                            ({{ Prescription_medicamenteuse::Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                                                ->Where('consultations.patient_id' , $patient->id)
                                                ->Where('confirmation', true)
                                                ->count()
                                            }})
                                        </h2>
                                        <small class="text-dark">
                                            Traitements chroniques
                                            ({{ Prescription_medicamenteuse::Join('consultations' , 'consultations.id' , 'prescription_medicamenteuses.consultation_id')
                                                ->Where('consultations.patient_id' , $patient->id)
                                                ->Where('confirmation', true)
                                                ->Where('prescription_medicamenteuses.duree', '=', "chronique")
                                                ->count()
                                            }})
                                        </small>
                                    </div>
                                    <a href="{{ route('ATCD', ['block' => 'médicaments']) }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</html>
