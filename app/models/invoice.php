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
    public function professional()
    {
        return $this->belongsTo('App\models\professional','professional_id');
    }
    public function file()
    {
        return $this->HasOne('App\models\file','id');
    }
}
