<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\models\invoice
 *
 * @property-read \App\models\file $file
 * @property-read \App\models\professional $profesional
 * @mixin \Eloquent
 */
Class Invoice extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    /*public function professional()
    {
        return $this->belongsTo('App\models\professional','id');
    }*/
    //Obtener datos
    public function professional()
    {
        return $this->hasone('App\models\professional', 'id', 'professional_id');
    }

    public function file()
    {
        return $this->HasOne('App\models\file','id','file_id');
    }
}
