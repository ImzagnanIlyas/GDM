<div class="col-md-12">

    <div class="loading-div" wire:loading>
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>

    <div id="upload" class="loading-div" style="visibility: hidden">
        <p>Téléchargement</p>
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>
<div class="row justify-content-around">

<div class="col-md-4 pb-3">
    <select class="form-control" name="Type" wire:model="select">
        <option name="Type" value="text">Text libre</option>
        <option name="Type" value="pdf">Fichiers PDF</option>
        <option name="Type" value="image">Fichiers Image</option>
        <option name="Type" value="video">Fichiers Video</option>
        <option name="Type" value="audio">Fichiers Audio</option>
    </select>
</div>

<div class="col-md-11">
@if ( $type === "text" )

    <form class='custom-form' wire:submit.prevent="submitText(Object.fromEntries(new FormData($event.target)))">
        <div class='form-group overflow-auto' style="max-height: 500px">
            <div id="quill-textarea" style="height: 200px; color: black;">
            </div>
        </div>
        <textarea class='form-control' rows="5" id="data-textarea" name="data-textarea" type="textarea" hidden></textarea>
        <button type='submit' class='btn btn-primary btn-lg btn-block'>Confirmer</button>
    </form>

@elseif ( $type === "pdf" )

    <form method="POST" action="{{ route('medecin.consultation.ExamSpecial.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
        @csrf
        <div class="form-group">
            <label for="files">Sélectionner un ou plusieurs fichiers</label>
            <input type="file" class="form-control-file" name="data[]" multiple>
            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
            <input type="text" name="type" value="{{ $type }}" hidden>
        </div>
        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
    </form>

@elseif ( $type === "image" )

    <form method="POST" action="{{ route('medecin.consultation.ExamSpecial.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
        @csrf
        <div class="form-group">
            <label for="files">Sélectionner un ou plusieurs fichiers</label>
            <input type="file" class="form-control-file" name="data[]" multiple>
            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
            <input type="text" name="type" value="{{ $type }}" hidden>
        </div>
        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
    </form>

@elseif ( $type === "video" )

    <form method="POST" action="{{ route('medecin.consultation.ExamSpecial.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
        @csrf
        <div class="form-group">
            <label for="files">Sélectionner un ou plusieurs fichiers</label>
            <input type="file" class="form-control-file" name="data[]" multiple>
            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
            <input type="text" name="type" value="{{ $type }}" hidden>
        </div>
        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
    </form>

@elseif ( $type === "audio" )

    <form method="POST" action="{{ route('medecin.consultation.ExamSpecial.storeFile') }}" enctype="multipart/form-data" class='custom-form'>
        @csrf
        <div class="form-group">
            <label for="files">Sélectionner un ou plusieurs fichiers</label>
            <input type="file" class="form-control-file" name="data[]" multiple>
            <input type="text" name="examen_id" value="{{ $examen->id }}" hidden>
            <input type="text" name="type" value="{{ $type }}" hidden>
        </div>
        <button type='submit' class='btn btn-primary btn-lg btn-block' onClick="$('#upload').css('visibility', 'visible');">Confirmer</button>
    </form>

@endif
</div>

</div>
</div>
