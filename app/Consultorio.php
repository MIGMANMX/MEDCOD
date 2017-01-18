<?php

namespace MEDCOD;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    //
    protected $table='Consultorio';
    protected $primaryKey='idConsultorio';
    public $timestamps=false;

    protected $fillable =[
     'Consultorio',
     'Descripcion',
     'Estado'
    ];

    protected $guarded =[

    ];
}
