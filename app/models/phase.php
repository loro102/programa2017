<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\phase
 *
 * @property-read \App\models\file $insurer
 * @mixin \Eloquent
 */
Class Phase extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function insurer()
    {
        return $this->belongsTo('App\models\file','phase_id','id');
    }
}
