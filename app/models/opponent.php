<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class opponent extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function file()
    {
        return $this->belongsToMany('App\models\file','id');
    }
    public function processor()
    {
        return $this->hasOne('App\models\processor','id','processor_id');
    }
    

}
