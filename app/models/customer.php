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

    public function agent()
    {
        return $this->belongsTo('App\Models\agent','agent_id');
    }
    public function files()
    {
        return $this->hasMany('App\Models\file');
    }

    public function file()
    {
        return $this->belongsToMany('App\Models\file');
    }
    public function invoice()
    {
        return $this->belongsToMany('App\Models\invoice');
    }

}
