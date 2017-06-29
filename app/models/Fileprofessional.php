<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\file_professional.
 *
 * @property \App\models\professional $professional
 * @mixin \Eloquent
 */
class Fileprofessional extends Model
{
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
