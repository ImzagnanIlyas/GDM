<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Patient extends Model
{
    use ModelLogging;

    
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}
