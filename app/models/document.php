<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\document
 *
 * @mixin \Eloquent
 */
class document extends Model
{
    //
    protected $guarded=[
        'id',
        'timestamp'
    ];
}
