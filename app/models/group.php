<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    //

    public function professional()
    {
        return $this->belongsTo('App\models\professional','group_id','id');
    }
}
