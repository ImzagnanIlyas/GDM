<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jahondust\ModelLog\Traits\ModelLogging;


class Medicament extends Model
{
    use ModelLogging;

    
    // PAs = Prescriptions_medicamenteuses
    public function PAs()
    {
        return $this->hasMany('App\Prescription_medicamenteuse');
    }
}
