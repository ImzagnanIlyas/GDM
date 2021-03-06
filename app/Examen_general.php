<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Examen_general extends Model
{
    use ModelLogging;

    public function consultation()
    {
        return $this->belongsTo('App\Consultation');
    }
}
