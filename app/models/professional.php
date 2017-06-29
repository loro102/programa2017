<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\professional.
 *
 * @property \App\models\file $file
 * @property \App\models\file_professional $fileProfessional
 * @property \App\models\group $group
 * @property \App\models\invoice $invoice
 * @mixin \Eloquent
 */
class Professional extends Model
{
    protected $guarded = [
        'id',
        'timestamps',
    ];

    public function file_professional()
    {
        return $this->belongsTo('App\models\file_professional', 'professional_id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\models\invoice', 'id', 'professional_id');
    }

    public function group()
    {
        return $this->hasOne('App\models\group', 'id', 'group_id');
    }

    public function file()
    {
        return $this->belongsTo('App\models\file', 'solicitor_id', 'id');
    }
}
