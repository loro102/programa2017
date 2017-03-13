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
    public function cliente()
    {
        return $this->belongsTo('App\Models\customer', 'id');
    }
    public function file()
    {
        return $this->HasOne('App\Models\file','id');
    }
}
