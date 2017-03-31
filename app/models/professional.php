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


    public function file_professional()
    {
        return $this->hasMany('App\models\file_professional');
    }
    public function invoice()
    {
        return $this->hasMany('App\models\invoice');
    }
}