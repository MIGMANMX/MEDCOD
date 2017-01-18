@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Paciente</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'paciente/pacientes','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
           <div class="row">
        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
        		<div class="form-group">
		            	<label for="nombre">Nombre</label>
		            	<input type="text" name="Nombre" required value="{{old('Nombre')}}" class="form-control" placeholder="Nombre(s)">
            	</div>
        	</div>

        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
	        	<div class="form-group">
	        		<label>Apellido</label>
	        		<input type="text" name="Apellido" required value="{{old('Apellido')}}" class="form-control" placeholder="Apellido(s)">
	        	</div>
        	</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        	<div class="form-group">
	        		<label>Direccion</label>
	        		<input type="text" name="Direccion" required value="{{old('Direccion')}}" class="form-control" placeholder="Direccion">
	        	</div>
        	</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
			            	<label for="codigo">Correo Electronico</label>
			            	<input type="text" name="Email" required value="{{old('Correo')}}" class="form-control" placeholder="email@mail.com">
	            	</div>
	        </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
			            	<label for="stock_min">Telefono</label>
			            	<input type="text" name="Telefono" required value="{{old('Telefono')}}" class="form-control" placeholder="Telefono">
	            	</div>
	        </div>
        	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
	        		<label>Fecha de Nacimento</label>
	        		<input type="text" name="Fecha_Nac" required value="{{old('Fecha_Nac')}}" class="form-control" placeholder="AAAAMMDD">
	        	</div>
        	</div>
        
	        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	        	<div class="form-group">
			            	<label for="stock_actual">Consultorio</label>
			            	<select name="idConsultorio" class="form-control">
			            	@foreach ($consultorios as $con)
	        					<option value="{{$con->idConsultorio}}">{{$con->Consultorio}}</option>
	        				@endforeach		
	        		</select>
	            </div>
	        </div>
	         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        	<div class="form-group">
			            	<label for="stock_actual">Medico</label>
			            	<select name="idMedicos" class="form-control">
			            	@foreach ($medicos as $med)
			            	<option value="{{$med->idMedicos}}">{{$med->Nombre}}</option>
			            	@endforeach
	        		
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