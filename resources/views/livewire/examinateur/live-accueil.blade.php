<div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header ">
            <h2 class="title pull-left">
                Examinateur {{ Auth::guard('examinateur')->user()->nom }}
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
            <h6>Examen confirmé</h6>
            <h2 class="text-right"><i class="fas fa-file-medical-alt pull-left"></i><span>256</span></h2>
            <p class="mb-0">Ce mois-ci<span class="pull-right">178</span></p>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card bg-green order-card">
        <div class="card-block">
            <h6>Patient traité</h6>
            <h2 class="text-right"><i class="fas fa-user-injured pull-left"></i><span>189</span></h2>
            <p class="mb-0">Ce mois-ci<span class="pull-right   ">156</span></p>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="card">
            @livewire('examinateur.live-recherche')
    </div>
</div>

</div>