<?php

namespace MEDCOD\Http\Controllers;

use Illuminate\Http\Request;

use MEDCOD\Http\Requests;
use MEDCOD\Consultorio;
use Illuminate\Support\Facades\Redirect;
use MEDCOD\Http\Requests\ConsultorioFormRequest;
use DB;

class ConsultorioController extends Controller
{
	public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $consultorios=DB::table('Consultorio')->where('Consultorio','LIKE','%'.$query.'%')
            ->where ('Estado','=','1')
            ->orderBy('idConsultorio','desc')
            ->paginate(7);
            return view('consultorio.consultorios.index',["consultorios"=>$consultorios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        
        return view("consultorio.consultorios.create");
    }
    public function store (ConsultorioFormRequest $request)
    {
        $consultorio=new Consultorio;
        $consultorio->Consultorio=$request->get('Consultorio');
        $consultorio->Descripcion=$request->get('Descripcion');
        $consultorio->Estado='1';
        $consultorio->save();
        return Redirect::to('consultorio/consultorios');

    }
    public function show($id)
    {
        return view("consultorio.consultorios.show",["Consultorio"=>Consultorio::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("consultorio.consultorios.edit",["Consultorio"=>Consultorio::findOrFail($id)]);
    }
    public function update(ConsultorioFormRequest $request,$id)
    {
        $consultorio=Consultorio::findOrFail($id);
        $consultorio->Consultorio=$request->get('Consultorio');
        $consultorio->Descripcion=$request->get('Descripcion');
        $consultorio->update();
        return Redirect::to('consultorio/consultorios');
    }
    public function destroy($id)
    {
        $consultorio=Consultorio::findOrFail($id);
        $consultorio->Estado='0';
        $consultorio->update();
        return Redirect::to('consultorio/consultorios');
    }
}
