<?php

namespace MEDCOD\Http\Controllers;

use Illuminate\Http\Request;

use MEDCOD\Http\Requests;

use MEDCOD\Receta;
use Illuminate\Support\Facades\Redirect;
use MEDCOD\Http\Requests\RecetaFormRequest;
use DB;
use Carbon\Carbon;

class RecetaController extends Controller
{
   public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $Evolucion=DB::table('Evolucion')->where('idPacientes','LIKE','%'.$query.'%')
            ->where ('Estado','=','1')
            ->orderBy('idEvolucion','asc')
            ->paginate(7);
            return view('paciente.evolucion.index',["Evolucion"=>$Evolucion,"searchText"=>$query]);
        }
    }
    public function create()
    {
        
        $Pacientes=DB::table('Pacientes')->where('Estado','=','1')->get();
        
        
        return view("paciente.evolucion.create",["Pacientes"=>$Pacientes]);
    }
    public function store (RecetaFormRequest $request)
    {
        $mytime = Carbon::now('America/Mexico_City');
        $evol=new Receta;
        $evol->idPacientes=$request->get('idPacientes');
        $evol->Recomendaciones=$request->get('Recomendaciones');
        $evol->Observaciones=$request->get('Observaciones');
        $evol->Medicacion=$request->get('Medicacion');
        $evol->Fecha=$mytime->toDateTimeString();
        $evol->Estado='1';
        $evol->save();
        return Redirect::to('paciente/evolucion');

    }
    public function show($id)
    {
        return view("paciente.evolucion.show",["Evolucion"=>Receta::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("paciente.evolucion.edit",["Evolucion"=>Receta::findOrFail($id)]);
    }
    public function update(ConsultorioFormRequest $request,$id)
    {
        $evol=Receta::findOrFail($id);
        $evol->Nombre=$request->get('Nombre');
        $evol->Especialidad=$request->get('Especialidad');
        $evol->update();
        return Redirect::to('paciente/evolucion');
    }
    public function destroy($id)
    {
        $evol=Receta::findOrFail($id);
        $evol->Estado='0';
        $evol->update();
        return Redirect::to('paciente/evolucion');
    }
}

