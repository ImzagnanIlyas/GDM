<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Examinateur extends Model
{
    use ModelLogging;

    //Responsable
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    // ECs = Examens_complimentaires
    public function ECs()
    {
        return $this->hasMany('App\Examen_complimentaire');
    }
}
