<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class phase extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function insurer()
    {
        return $this->belongsTo('App\models\file','phase_id','id');
    }
}
