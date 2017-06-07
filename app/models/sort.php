<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class sort extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function file()
    {
        return $this->belongsTo('App\models\file', 'sort_id','id');
    }
}
