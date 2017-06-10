<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function user()
    {
        return $this->HasOne('App\User','id','user_id');
    }
}
