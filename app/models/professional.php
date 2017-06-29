<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\professional
 *
 * @property-read \App\models\file $file
 * @property-read \App\models\file_professional $fileProfessional
 * @property-read \App\models\group $group
 * @property-read \App\models\invoice $invoice
 * @mixin \Eloquent
 */
Class Professional extends Model
{
    //
    protected $guarded = [
        'id',
        'timestamps',
    ];

    public function file_professional()
    {
        return $this->belongsTo('App\models\file_professional','professional_id');
    }
    public function invoice()
    {
        return $this->belongsTo('App\models\invoice','id','professional_id');
    }
    public function group()
    {
        return $this->hasOne('App\models\group', 'id','group_id');
    }
    public function file()
    {
        return $this->belongsTo('App\models\file','solicitor_id','id');
    }

}