<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\note
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
Class Note extends Model
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
