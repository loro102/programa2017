<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\file
 *
 * @property-read \App\models\customer $customer
 * @property-read \App\models\insurer $insurer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\opponent[] $opponent
 * @property-read \App\models\phase $phase
 * @property-read \App\models\professional $professional
 * @property-read \App\models\sort $sort
 * @mixin \Eloquent
 */
Class File extends Model
{
    protected $guarded = [
        'id',
        'timestamps',
    ];

    public function customer()
    {
        return $this->belongsTo('App\models\customer','customer_id');
    }

    public function sort()
    {
        return $this->hasOne('App\models\sort', 'id','sort_id');
    }
    public function opponent()
    {
        return $this->hasmany('App\models\opponent', 'file_id');
    }

    /*public function solicitor()
    {
        return $this->belongsTo('App\models\solicitor','solicitor_id');
    }
     */
    public function insurer()
    {
        return $this->hasOne('App\models\insurer','id','insurer_id');
    }
    public function phase()
    {
        return $this->hasOne('App\models\phase','id','phase_id');
    }
    public function professional()
    {
        return $this->hasOne('App\models\professional','id','solicitor_id');
    }


    /* public function agent()
     {
         return $this->belongsTo('App\models\agent','agent_id');
     }*/
}
