@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Medicos <a href="medicos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('medico.medicos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Especialidad</th>
					<th>Opciones</th>
				</thead>
               @foreach ($medicos as $med)
				<tr>
					<td>{{ $med->idMedicos}}</td>
					<td>{{ $med->Nombre}}</td>
					<td>{{ $med->Especialidad}}</td>
					<td>
						<a href="{{URL::action('MedicoController@edit',$med->idMedicos)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$med->idMedicos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('medico.medicos.modal')
				@endforeach
			</table>
		</div>
		{{$medicos->render()}}
	</div>
</div>

@endsection