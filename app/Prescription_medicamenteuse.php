<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Prescription_medicamenteuse extends Model
{
    use ModelLogging;
    

    public function consultation()
    {
        return $this->belongsTo('App\Consultation');
    }

    public function pharmacie()
    {
        return $this->belongsTo('App\Pharmacie');
    }
}
