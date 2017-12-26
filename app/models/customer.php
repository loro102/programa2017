<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\models\customer
 *
 * @property-read \App\models\agent $agent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\file[] $file
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\file[] $files
 * @property-read mixed $fullName
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\invoice[] $invoice
 * @mixin \Eloquent
 */
Class Customer extends Model
{
    Use Searchable;
    public $resultados = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */

    //
    protected $guarded = [
        'id',
        'timestamps',
    ];

    public function nombrecompleto($value)
    {
        return $this->nombre.' '.$this->apellidos;
    }

    public function getfullnameattribute($value)
    {
        return $this->nombre . ' ' . $this->apellidos;
    }


    public function apellidonombre($value)
    {
        return $this->apellidos.' , '.$this->nombre;
    }

    public function agent()
    {
        return $this->belongsTo('App\models\agent', 'agent_id');
    }

    public function files()
    {
        return $this->hasMany('App\models\File');
    }

    public function file()
    {
        return $this->belongsToMany('App\models\File');
    }

    public function invoice()
    {
        return $this->hasMany('App\models\invoice');
    }

    /*  public function searchableAs()
      {
          return 'customer_index';
      }*/
    public function toSearchableArray()
    {

        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'nif' => $this->nif,

        ];
    }


    /*public function  Scopeclientes($buscar ,$tip)
    {

        $clientes=$this->search($buscar);
        $expediente=$this->file->search($buscar);
        $oponente=$this->file->opponent->($buscar);
        return $this->search($buscar);
    }*/
}
