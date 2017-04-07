<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class invoice extends Model
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
    public function profesional()
    {
        return $this->HasOne('App\models\professional','id');
    }
    public function file()
    {
        return $this->HasOne('App\models\file','id');
    }
}
