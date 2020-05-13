<div>
@php
    use App\Consultation;
    use App\Prescription_medicamenteuse;
@endphp
<div class="col-md-12">
    <div class="card">
        <div class="card-header ">
            <h2 class="title pull-left">
                Pharmacie {{ Auth::guard('pharmacie')->user()->nom }}
            </h2>
            <h4 id="timedate" style="float: right !important;">
                <span id="d">1</span>
                <span id="mon">January</span>
                <span id="y">0</span><br />
                <span id="h">12</span> :
                <span id="m">00</span>:
                <span id="s">00</span>
                <span id="mi" style="display: none">000</span>
            </h4>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card bg-blue order-card">
        <div class="card-block">
            <h6>Ordonnance confirmé</h6>
            <h2 class="text-right"><i class="fas fa-file-medical-alt pull-left"></i><span>
                {{
                Consultation::select('consultations.*')
                ->join('prescription_medicamenteuses' ,'consultations.id', '=', 'prescription_medicamenteuses.consultation_id')
                ->where('prescription_medicamenteuses.pharmacie_id', Auth::guard('pharmacie')->user()->id)
                ->where('prescription_medicamenteuses.confirmation', true)
                ->groupBy('prescription_medicamenteuses.consultation_id')
                ->get()
                ->count()
                }}
            </span></h2>
            <p class="mb-0">Ce mois-ci<span class="pull-right">
                {{
                Consultation::select('consultations.*')
                ->join('prescription_medicamenteuses' ,'consultations.id', '=', 'prescription_medicamenteuses.consultation_id')
                ->whereMonth('prescription_medicamenteuses.created_at', date('m'))
                ->where('prescription_medicamenteuses.pharmacie_id', Auth::guard('pharmacie')->user()->id)
                ->where('prescription_medicamenteuses.confirmation', true)
                ->groupBy('prescription_medicamenteuses.consultation_id')
                ->get()
                ->count()
                }}
            </span></p>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card bg-green order-card">
        <div class="card-block">
            <h6>Médicaments vendus</h6>
            <h2 class="text-right"><i class="fas fa-pills pull-left"></i><span>
                {{
                Prescription_medicamenteuse::where('pharmacie_id', Auth::guard('pharmacie')->user()->id)->get()->count()
                }}
            </span></h2>
            <p class="mb-0">Ce mois-ci<span class="pull-right">
                {{
                Prescription_medicamenteuse::where('pharmacie_id', Auth::guard('pharmacie')->user()->id)->whereMonth('created_at', date('m'))->get()->count()
                }}
            </span></p>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="card">
            @livewire('pharmacie.live-recherche')
    </div>
</div>

</div>
