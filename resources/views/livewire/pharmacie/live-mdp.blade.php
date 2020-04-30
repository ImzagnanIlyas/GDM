<div>
<div class="col-sm-8 col-md-9">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('not'))
        <div class="alert alert-danger">
            {{ session('not') }}
        </div>
    @endif
    <div class="card">
        <div class="card-block">
            <h2 class="title">Change password</h2>
            <form accept-charset="utf-8" class="password" wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">

            <div class="form-group">
                <label for="old_password" class="control-label">Mot de passe actuel</label>
                <input class="form-control" placeholder="S'il vous plaît saisir le mot de passe actuel" type="password" name="old_password" wire:model="old_password">
                @error('old_password') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Nouveau mot de passe</label>
                <input class="form-control" placeholder="S'il vous plaît le nouveau mot de passe" type="password" name="password" wire:model="password">
                @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="password_confirmation" class="control-label">Confirmer le nouveau mot de passe</label>
                <input class="form-control" placeholder="S'il vous plaît répéter le nouveau mot de passe" type="password" name="password_confirmation" wire:model="password_confirmation">
                @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <input class="btn btn-primary" type="submit" value="Changer le mot de passe">
            <br>
            <br>

            </form>
        </div>
    </div>
</div>

</div>
