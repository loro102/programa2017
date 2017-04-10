<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class file extends Model
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
        return $this->hasOne('App\models\sort', 'id');
    }
    public function opponent()
    {
        return $this->hasmany('App\models\opponent', 'file_id');
    }

    /*public function solicitor()
    {
        return $this->belongsTo('App\models\solicitor','solicitor_id');
    }

    public function insurer()
    {
        return $this->belongsTo('App\models\insurer','insurer_id');
    }

    public function agent()
    {
        return $this->belongsTo('App\models\agent','agent_id');
    }*/
}
