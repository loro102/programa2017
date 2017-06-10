<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class insurer extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function file()
    {
        return $this->belongsTo('App\models\file','insurer_id','id');
    }
}

