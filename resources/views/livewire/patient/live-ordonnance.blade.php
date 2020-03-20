<div>
<div class="col-sm-8 col-md-12">
    <div class="card">
        <div class="card-block">
            <div class="col-lg-8" style="margin-left: 17%;">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img
                        class="media-object img-circle"
                        @if($patient->sexe === "Mâle")
                        src="{{ asset('img/male.png') }}"
                        @else
                        src="{{ asset('img/female.png') }}"
                        @endif
                        style="width: 100px;height:100px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            @if($patient->sexe === "Mâle")
                            M.
                            @else
                            Mme.
                            @endif
                            {{ strtoupper($patient->nom) }}
                            {{ $patient->prenom }}
                        </h4>
                        <h5>{{ $patient->cin }} - {{ date("m/d/yy", strtotime($patient->ddn)) }}</h5>
                        <hr style="margin:8px auto">
                        <p>{{ strtoupper($patient->adresse) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session()->has('message'))
<div class="col-sm-8 col-md-12">
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
</div>
@endif
@if($item)
<div class="bootcards-list col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h3 class="panel-title text-center">Ordonnances</h3>
        </div>
        <div class="list-group js-pscroll" style="max-height: 485px;">
            @foreach ($consultations as $consultation)
            <!-- Start : items  -->
            <div
                class="list-group-item"
                wire:click="switchItem({{ $consultation->id }})"
            @if($consultation->id === $item->id)
                style="box-shadow: inset 0px 0px 12px 1px rgba(0, 0, 0, 0.3); border-left: 10px inset #B9B9B9; border-radius: 0px 0px 0px 0px;"
            @endif
            >
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="list-group-item-heading">Docteur {{ $consultation->medecin->patient->nom }}</h4>
                        <p class="list-group-item-text">Specialite {{ $consultation->medecin->specialite }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="list-group-item-text">{{ $consultation->PMs->first()->created_at }}</p>
                        <p class="list-group-item-text">{{ $consultation->PMs->count() }} medicament(s)</p>
                    </div>
                </div>
            </div>
            <!-- End : items  -->
            @endforeach
        </div>
    </div>
</div>
@else
<br>
<div class="col-sm-8 col-md-12">
    <div class="alert alert-warning text-center" role="alert">
        Pas d'ordonnance pour ce patient
    </div>
</div>
@endif
<div class="col-sm-6">
    @if($item)
    <!-- data  -->
        <div class="panel panel-default companies">
            <div class="panel-heading clearfix">
                <h3 class="panel-title text-center">Détails</h3>
            </div>
            <div class="list-group">
                <div class="list-group-item">
                    <h3 class="list-group-item-heading">Docteur {{ $item->medecin->patient->nom }}</h3>
                    <h4 class="list-group-item-heading">Specialite {{ $item->medecin->specialite }}</h4>
                </div>
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $item->medecin->type }}</h4>
                    <h4 class="list-group-item-heading">{{ $item->medecin->lieu }}</h4>
                </div>
                <div class="list-group-item">
                    <p class="list-group-item-text">
                    @if($item->ordonnance)
                        {{ $item->ordonnance }}
                    @else
                        No ordonnance
                    @endif
                    </p>
                </div>
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">Medicaments</h4>
                </div>
                <div class="list-group-item">
                <form wire:submit.prevent="confirmer(Object.fromEntries(new FormData($event.target)))">
                    @foreach ($item->PMs as $PM)
                    <!-- medi -->
                    @if($PM->confirmation)
                    @if( $PM->pharmacie_id === Auth::guard('pharmacie')->user()->id )
                    <div class="inputGroupConfiM">
                        <input id="{{ $PM->id }}" name="{{ $PM->id }}" type="checkbox" checked disabled/>
                        <label for="{{ $PM->id }}">
                            <h4 class="list-group-item-heading">{{ $PM->medicament->nom }}</h4>
                            <h5 class="list-group-item-heading">{{ $PM->medicament->dosage }} {{ $PM->medicament->unite_dosage }}</h5>
                            <span class="badge badge-light">Confirmé par : vous</span>
                        </label>
                    </div>
                    @else
                    <div class="inputGroupConfi">
                        <input id="{{ $PM->id }}" name="{{ $PM->id }}" type="checkbox" checked disabled/>
                        <label for="{{ $PM->id }}">
                            <h4 class="list-group-item-heading">{{ $PM->medicament->nom }}</h4>
                            <h5 class="list-group-item-heading">{{ $PM->medicament->dosage }} {{ $PM->medicament->unite_dosage }}</h5>
                            <span class="badge badge-light">Confirmé par : Pharmacie {{ $PM->pharmacie->nom }}</span>
                        </label>
                    </div>
                    @endif
                    @else
                    <div class="inputGroup">
                        <input id="{{ $PM->id }}" name="{{ $PM->id }}" type="checkbox"/>
                        <label for="{{ $PM->id }}">
                            <h4 class="list-group-item-heading">{{ $PM->medicament->nom }}</h4>
                            <h5 class="list-group-item-heading">{{ $PM->medicament->dosage }} {{ $PM->medicament->unite_dosage }}</h5>
                        </label>
                    </div>
                    @endif
                    <!-- medi -->
                    @endforeach
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary btn-lg btn-block" {{ $disabled }}>Confirmer</button>
                </div>
                </form>
            </div>
        </div>
    <!-- data  -->
    @endif
</div>

</div>
