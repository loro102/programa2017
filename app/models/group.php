<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\group
 *
 * @property-read \App\models\professional $professional
 * @mixin \Eloquent
 */
class group extends Model
{
    //

    public function professional()
    {
        return $this->belongsTo('App\models\professional','group_id','id');
    }
}
