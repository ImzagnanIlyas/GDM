<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Examen_complimentaire extends Model
{
    use ModelLogging;

    public function consultation()
    {
        return $this->belongsTo('App\Consultation');
    }

    public function examinateur()
    {
        return $this->belongsTo('App\Examinateur');
    }
}
