<?php

namespace MEDCOD;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    
       //
    protected $table='Evolucion';
    protected $primaryKey='idEvolucion';
    public $timestamps=false;

    protected $fillable =[
     'idPacientes',
     'Recomendaciones',
     'Observaciones',
     'Medicacion',
     'Fecha'
    ];

    protected $guarded =[

    ];
}
