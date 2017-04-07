<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $guarded = [
    'id',
    'timestamps',
    ];

    public function getFullNameAttribute($value)
    {
        return $this->nombre . ' ' . $this->apellidos;
    }
    public function Apellidonombre($value)
    {
        return $this->apellidos . ' , ' . $this->nombre;
    }

    public function agent()
    {
        return $this->belongsTo('App\models\agent','agent_id');
    }
    public function files()
    {
        return $this->hasMany('App\models\file');
    }

    public function file()
    {
        return $this->belongsToMany('App\models\file');
    }
    public function invoice()
    {
        return $this->hasMany('App\models\invoice');
    }


}
