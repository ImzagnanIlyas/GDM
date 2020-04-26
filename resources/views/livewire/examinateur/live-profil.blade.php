<div>
<div class="col-sm-8 col-md-9">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-block">
            <h5 class="title">Profil</h5>
            <form class="update-profile" wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label" for="inpe">
                                INPE
                            </label>
                            <input class="form-control" type="text" name="inpe" value="{{ $examinateur->inpe }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label" for="titre">
                                Titre
                            </label>
                            <input class="form-control" type="text" name="titre" value="{{ $examinateur->nom }}" wire:model="titre">
                            @error('titre') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label" for="adresse">
                                Adresse
                            </label>
                            <input class="form-control" type="text" name="adresse" value="{{ $examinateur->adresse }}" wire:model="adresse">
                            @error('adresse') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label" for="telephone">
                                Numéro de téléphone
                            </label>
                            <input class="form-control" type="text" name="telephone" value="{{ $examinateur->tele }}" wire:model="telephone">
                            @error('telephone') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label" for="proprietaire">
                                Propriétaire
                            </label>
                            <input class="form-control" type="text" name="proprietaire" value="{{ strtoupper($examinateur->patient->nom) }} {{ $examinateur->patient->prenom }} - {{ $examinateur->patient->cin }}" disabled>
                        </div>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success">Update Info</button>
                            <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div wire:poll.5000ms class="hidden">

</div>


</div>
