<?php

namespace MEDCOD\Http\Controllers;

use Illuminate\Http\Request;

use MEDCOD\Http\Requests;

use MEDCOD\Paciente;
use Illuminate\Support\Facades\Redirect;
use MEDCOD\Http\Requests\PacienteFormRequest;
use DB;

class PacienteController extends Controller
{
    //
     //
    public function __construct()
    {
    }

    
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $Pacientes=DB::table('Pacientes')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Estado','=','1')
            //->where ('idMedicos','=','1')
            ->orderBy('idPacientes','asc')
            ->paginate(7);
            return view('paciente.pacientes.index',["Pacientes"=>$Pacientes,"searchText"=>$query]);
        }
    }
    public function create()
    {

    	$consultorios=DB::table('Consultorio')->where('Estado','=','1')->get();
        $medicos=DB::table('Medicos')->where('Estado','=','1')->get();

       return view("paciente.pacientes.create",["consultorios"=>$consultorios,"medicos"=>$medicos]);
    }
    public function store (PacienteFormRequest $request)
    {
        $paciente=new Paciente;
        $paciente->Nombre=$request->get('Nombre');
        $paciente->Apellido=$request->get('Apellido');
        $paciente->Direccion=$request->get('Direccion');
        $paciente->Email=$request->get('Email');
        $paciente->Telefono=$request->get('Telefono');
        $paciente->Fecha_Nac=$request->get('Fecha_Nac');
        $paciente->Estado='1';
        $paciente->idConsultorio=$request->get('idConsultorio');
        $paciente->idMedicos=$request->get('idMedicos');

        


        $paciente->save();
        return Redirect::to('paciente/pacientes');
    }
    public function show($id)
    {
   		return view("paciente.pacientes.show",["paciente"=>Paciente::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("paciente.pacientes.edit",["paciente"=>Paciente::findOrFail($id)]);
    }
    public function update(PacienteFormRequest $request,$id)
    {
        $paciente=Paciente::findOrFail($id);
        $paciente->Nombre=$request->get('Nombre');
        $paciente->Apellido=$request->get('Apellido');
        $paciente->Direccion=$request->get('Direccion');
        $paciente->Email=$request->get('Email');
        $paciente->Telefono=$request->get('Telefono');
        $paciente->Fecha_Nac=$request->get('Fecha_Nac');
        $paciente->Estado='1';
        $paciente->idConsultorio=$request->get('idConsultorio');
        $paciente->idMedicos=$request->get('idMedicos');

        $paciente->update();
        return Redirect::to('paciente/pacientes');
    }
    public function destroy($id)
    {
        $paciente=Paciente::findOrFail($id);
        $paciente->Estado='0';
        $paciente->update();
        return Redirect::to('paciente/pacientes');
    }
}
