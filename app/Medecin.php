<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Medecin extends Model
{
    use ModelLogging;
    
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}
