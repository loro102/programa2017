<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\sort
 *
 * @property-read \App\models\file $file
 * @mixin \Eloquent
 */
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
