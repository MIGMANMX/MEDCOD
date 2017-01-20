<?php

namespace MEDCOD\Http\Controllers;

use Illuminate\Http\Request;

use MEDCOD\Http\Requests;
use MEDCOD\Medico;
use Illuminate\Support\Facades\Redirect;
use MEDCOD\Http\Requests\MedicoFormRequest;
use DB;

class MedicoController extends Controller
{
   public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $medicos=DB::table('Medicos')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Estado','=','1')
            ->orderBy('idMedicos','asc')
            ->paginate(7);
            return view('medico.medicos.index',["medicos"=>$medicos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        
        return view("medico.medicos.create");
    }
    public function store (MedicoFormRequest $request)
    {
        $medico=new Medico;
        $medico->Nombre=$request->get('Nombre');
        $medico->Especialidad=$request->get('Especialidad');
        $medico->Estado='1';
        $medico->save();
        return Redirect::to('medico/medicos');

    }
    public function show($id)
    {
        return view("medico.medicos.show",["Medico"=>Medico::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("medico.medicos.edit",["Medico"=>Medico::findOrFail($id)]);
    }
    public function update(ConsultorioFormRequest $request,$id)
    {
        $medico=Medico::findOrFail($id);
        $medico->Nombre=$request->get('Nombre');
        $medico->Especialidad=$request->get('Especialidad');
        $medico->update();
        return Redirect::to('medico/medicos');
    }
    public function destroy($id)
    {
        $medico=Medico::findOrFail($id);
        $medico->Estado='0';
        $medico->update();
        return Redirect::to('medico/medicos');
    }
}

