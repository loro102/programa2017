<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\agent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\customer[] $customer
 * @mixin \Eloquent
 */
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
