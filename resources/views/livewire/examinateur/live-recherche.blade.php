<div>

<div class="card-header ">
    <h5>Rechercher un patient</h5>
    <div class="pull-right">
        <div class="float-right">
            <input
                type="text"
                class="bg-light form-control border-1 small"
                placeholder="Rechercher par CIN ..."
                wire:model="query"
            />
        </div>
    </div>
</div>
<div class="card-block">
    <div class="list-group js-pscroll" style="max-height: 325px;">
        <div class="col-sm-8 col-md-12">
        @forelse ($patients as $patient)
            <div class="card" style="box-shadow: inset 0px 0px 12px 1px rgba(0, 0, 0, 0.3); cursor: pointer;" wire:click="ordonnance({{ $patient->id }})">
                <div class="card-block">
                    <div class="col-lg-12">
                        <div class="media">
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
        @empty
            @if ($query)
            <br>
            <div class="alert alert-warning text-center" role="alert">
                Aucun résultats pour ce CIN.
            </div>
            @endif
        @endforelse
        </div>
    </div>
</div>

</div>
