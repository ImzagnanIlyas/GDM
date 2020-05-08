<div>
    <div class="col-md-12 d-flex justify-content-end mt-2">
        <input class="form-control col-2" type="text" placeholder="Rechercher par date" wire:model="searchInput" onfocus="(this.type='date')" onblur="(this.type='text')">
    </div>
    <div class="d-flex justify-content-center mt-2"">
        @if ($consultations->isEmpty())
            <div class="alert alert-warning mt-4" role="alert">
                Ce patient n'a pas d'ordonnance.
            </div>
        @else
            <div class="table-responsive table col-md-12 mt-2 overflow-auto" style="max-height: 430px">
                <table class="table dataTable my-0">
                    <thead>
                        <tr>
                            <th>ID Consultation</th>
                            <th>Médecin</th>
                            <th>Médicaments</th>
                            <th>Date</th>
                            <th>Ordonnance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $consultations as $c )
                        <tr>
                            <td><a href="{{ route('medecin.consultation.showInfo', [ 'id' => Crypt::encrypt($c->id) ]) }}">{{ $c->id }}</a></td>
                            <td>{{ strtoupper($c->medecin->patient->nom).' '.strtoupper($c->medecin->patient->prenom) }}</td>
                            <td>{{ $c->PMs->count() }}</td>
                            <td>{{ date('d/m/Y',strtotime($c->PMs->first()->created_at)) }}</td>
                            <td><a href="{{ route('medecin.dossier.showOrdonnance', [ 'patient_id' => Crypt::encrypt($patient->id), 'consultation_id' => Crypt::encrypt($c->id) ]) }}" class="btn btn-primary"><i class="fas fa-file-alt"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <div class="alert alert-warning" role="alert">
                                Vous n'avez effectué aucune consultation.
                            </div>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $consultations->links() }}
    </div>
<div>
