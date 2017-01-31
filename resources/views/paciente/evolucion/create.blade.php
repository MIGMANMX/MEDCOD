@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Receta</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'paciente/evolucion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            	<label for="Recomendaciones">Recomendaciones</label>
            	<input type="text" name="Recomendaciones" class="form-control" placeholder="Recomendaciones">
            </div></div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            	<label for="Observaciones">Observaciones</label>
            	<input type="text" name="Observaciones" class="form-control" placeholder="Observaciones">
            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
            	<label for="Medicacion">Medicacion</label>
            	<input type="text" name="Medicacion" class="form-control" placeholder="Medicacion">
            </div>
            </div>
           


            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        	<div class="form-group">
			            	<label for="Nombre">Nombre</label>
			            	<select name="idPacientes" class="form-control">
			            	@foreach ($Pacientes as $pac)
	        					<option value="{{$pac->idPacientes}}">{{$pac->Nombre}}  {{$pac->Apellido}}</option>
	        				@endforeach		
	        		</select>
	            </div>
	        </div>

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">

            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection