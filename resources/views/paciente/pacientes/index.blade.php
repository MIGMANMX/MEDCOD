@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pacientes <a href="pacientes/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('paciente.pacientes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Fecha de Nacimiento</th>
					<th>Consultorio</th>
					<th>Medico</th>
					<th>Opciones</th>
				</thead>
				@foreach ($Pacientes as $pac)
				<tr>
					<td>{{$pac->idPacientes}}</td>
					<td>{{$pac->Nombre}}</td>
					<td>{{$pac->Apellido}}</td>
					<td>{{$pac->Direccion}}</td>
					<td>{{$pac->Email}}</td>
					<td>{{$pac->Telefono}}</td>
					<td>{{$pac->Fecha_Nac}}</td>
					<td>{{$pac->idConsultorio}}</td>
					<td>{{$pac->idMedicos}}</td>
					<td>
						<a href="{{URL::action('PacienteController@edit',$pac->idPacientes)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$pac->idPacientes}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</tr>

				</th>  
				@endforeach
			</table>
		</div>
		{{$Pacientes->render()}}
	</div>
</div>

@endsection