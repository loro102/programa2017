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
        return $this->belongsTo('App\Models\customer','customer_id');
    }
    

    /*public function solicitor()
    {
        return $this->belongsTo('App\Models\solicitor','solicitor_id');
    }

    public function insurer()
    {
        return $this->belongsTo('App\Models\insurer','insurer_id');
    }

    public function agent()
    {
        return $this->belongsTo('App\Models\agent','agent_id');
    }*/
}
