<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\customer
 *
 * @property-read \App\models\agent $agent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\file[] $file
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\file[] $files
 * @property-read mixed $fullName
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\invoice[] $invoice
 * @mixin \Eloquent
 */
Class Customer extends Model
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

    Public function Apellidonombre($value)
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
