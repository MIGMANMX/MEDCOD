@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Consultorios <a href="consultorios/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('consultorio.consultorios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Opciones</th>
				</thead>
               @foreach ($consultorios as $con)
				<tr>
					<td>{{ $con->idConsultorio}}</td>
					<td>{{ $con->Consultorio}}</td>
					<td>{{ $con->Descripcion}}</td>
					<td>
						<a href="{{URL::action('ConsultorioController@edit',$con->idConsultorio)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$con->idConsultorio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('consultorio.consultorios.modal')
				@endforeach
			</table>
		</div>
		{{$consultorios->render()}}
	</div>
</div>

@endsection