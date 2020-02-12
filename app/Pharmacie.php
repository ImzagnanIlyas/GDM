<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Pharmacie extends Model
{
    use ModelLogging;

    
    //Responsable
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    // PMs = Prescriptions_medicamenteuses
    public function PMs()
    {
        return $this->hasMany('App\Prescription_medicamenteuse');
    }
}
