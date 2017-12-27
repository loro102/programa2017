<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\professional.
 *
 * @property \App\models\file $file
 * @property \App\models\Fileprofessional $fileProfessional
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

    public function fileprofessional()
    {
        return $this->belongsTo('App\models\Fileprofessional', 'professional_id');
    }

    public function invoice()
    {
        return $this->hasmany('App\models\invoice', 'professional_id', 'id');
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
