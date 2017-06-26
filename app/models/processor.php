<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\processor
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\insurer[] $insurer
 * @mixin \Eloquent
 */
class processor extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function insurer()
    {
        return $this->belongsToMany('App\models\insurer','insurer_id');
    }
    public function opponent()
    {
        return $this->belongto('App\models\opponent','id');
    }

}
