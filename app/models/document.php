<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\document
 *
 * @mixin \Eloquent
 */
Class Document extends Model
{
    //
    protected $guarded=[
        'id',
        'timestamp'
    ];
}
