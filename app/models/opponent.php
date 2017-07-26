<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\models\opponent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\file[] $file
 * @property-read \App\models\processor $processor
 * @mixin \Eloquent
 */
Class Opponent extends Model
{
    //
    use Searchable;
    protected $guarded = [
        'id',
        'timestamps',
    ];
    public function file()
    {
        return $this->belongsToMany('App\models\file','id');
    }
    public function processor()
    {
        return $this->hasOne('App\models\processor','id','processor_id');
    }

    public function searchableAs()
    {
        return 'opponent_index';
    }
    

}
