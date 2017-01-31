@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar: {{$Receta->idEvolucion}}</h3>-->
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($Receta,['method'=>'PATCH','route'=>['paciente.evolucion.update',$Receta->idEvolucion]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" value="{{$Receta->idEvolucion}}" placeholder="Nombre Completo">
            </div>
            <div class="form-group">
            	<label for="descripcion">Especialidad</label>
            	<input type="text" name="Especialidad" class="form-control" value="{{$Receta->idPaciente}}" placeholder="Especialidad">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection