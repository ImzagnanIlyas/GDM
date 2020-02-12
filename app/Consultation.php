<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Consultation extends Model
{
    use ModelLogging;

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function medecin()
    {
        return $this->belongsTo('App\Medecin');
    }

    // EG = Examen_general
    public function EG()
    {
        return $this->hasOne('App\Examen_general');
    }

    // ECs = Examens_complimentaires
    public function ESs()
    {
        return $this->hasMany('App\Examen_specialise');
    }

    // ECs = Examens_complimentaires
    public function ECs()
    {
        return $this->hasMany('App\Examen_complimentaire');
    }

    // PMs = Prescriptions_medicamenteuses
    public function PMs()
    {
        return $this->hasMany('App\Prescription_medicamenteuse');
    }
}
