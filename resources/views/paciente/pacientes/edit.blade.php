@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paciente: {{ $paciente->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($paciente,['method'=>'PATCH','route'=>['paciente.pacientes.update',$paciente->idPacientes]])!!}
            {{Form::token()}}
         

             <div class="row">
        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
        		<div class="form-group">
		            	<label for="nombre">Nombre</label>
		            	<input type="text" name="Nombre" required value="{{$paciente->Nombre}}" class="form-control" placeholder="Nombre(s)">
            	</div>
        	</div>

        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
	        	<div class="form-group">
	        		<label>Apellido</label>
	        		<input type="text" name="Apellido" required value="{{$paciente->Apellido}}" class="form-control" placeholder="Apellido(s)">
	        	</div>
        	</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        	<div class="form-group">
	        		<label>Direccion</label>
	        		<input type="text" name="Direccion" required value="{{$paciente->Direccion}}"  class="form-control" placeholder="Direccion">
	        	</div>
        	</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
			            	<label for="codigo">Correo Electronico</label>
			            	<input type="text" name="Email" required value="{{$paciente->Email}}" class="form-control" placeholder="email@mail.com">
	            	</div>
	        </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
			            	<label for="stock_min">Telefono</label>
			            	<input type="text" name="Telefono" required value="{{$paciente->Telefono}}" class="form-control" placeholder="Telefono">
	            	</div>
	        </div>
        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
	        		<label>Fecha de Nacimento</label>
	        		<input type="text" name="Fecha_Nac" required value="{{$paciente->Fecha_Nac}}" class="form-control" placeholder="AAAAMMDD">
	        	</div>
        	</div>
        
	        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
			            	<label for="stock_actual">Consultorio</label>
			            	<select name="idConsultorio" class="form-control">
			            	
	        		</select>
	            </div>
	        </div>
	         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        	<div class="form-group">
			            	<label for="stock_actual">Medico</label>
			            	<select name="idMedicos" class="form-control">
			            	
	        		
	        		</select>
	            </div>
	        </div>
        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

        	</div>
        </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection