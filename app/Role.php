<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
