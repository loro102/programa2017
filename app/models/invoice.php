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
        return $this->belongsToMany('App\Models\file')->withPivot('customer_id','customers');
    }
}
