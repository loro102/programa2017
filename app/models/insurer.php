<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\insurer
 *
 * @property-read \App\models\file $file
 * @mixin \Eloquent
 */
class insurer extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function file()
    {
        return $this->belongsTo('App\models\file','insurer_id','id');
    }
}

