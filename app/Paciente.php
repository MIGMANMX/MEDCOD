<?php

namespace MEDCOD;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table='Pacientes';
    protected $primaryKey='idPacientes';
    public $timestamps=false;

    protected $fillable =[
     'Nombre',
     'Apellido',
     'Direccion',
     'Email',
     'Telefono',
     'Estado',
     'idConsultorio',
     'idMedicos'
    ];

    protected $guarded =[

    ];
}
