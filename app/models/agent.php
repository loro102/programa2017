<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class agent extends Model
{
    protected $guarded = [
        'id',
        'timestamps',


    ];
    public function customer()
    {
        return $this->hasmany('App\Models\customer');
    }
}
