<?php

namespace MEDCOD;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
     //
    protected $table='Medicos';
    protected $primaryKey='idMedicos';
    public $timestamps=false;

    protected $fillable =[
     'Nombre',
     'Especialidad',
     'Estado'
    ];

    protected $guarded =[

    ];
}
