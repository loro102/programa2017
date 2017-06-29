<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\file_professional
 *
 * @property-read \App\models\professional $professional
 * @mixin \Eloquent
 */
Class file_professional extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];

    public function professional()
    {
        return $this->belongsTo('App\models\professional', 'professional_id');
    }

   /* public function professional()
    {
        return $this->hasMany('App\models\professional');
    }*/


}