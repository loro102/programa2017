<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class professional extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];


    /*public function file_professional()
    {
        return $this->hasMany('App\models\file_professional',professional_id);
    }*/
    public function file_professional()
    {
        return $this->belongsTo('App\models\file_professional',professional_id);
    }
    public function invoice()
    {
        return $this->hasMany('App\models\invoice');
    }
    public function group()
    {
        return $this->hasOne('App\models\group', 'id');
    }
}