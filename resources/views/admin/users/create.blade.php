@extends('admin.main')


@section('title','Crear Usuario')

@section('content')

	{!! Form::open(['route'=>'tk.users.store','method'=>'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre')!!}
		{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre completo','required'])!!}
	</div>
	<div class="form-group">
		{!! Form::label('email','Email')!!}
		{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'correo@gmail.com','required'])!!}
	</div>
	<div class="form-group">
		{!! Form::label('password','Contraseña')!!}
		{!! Form::password('password',['class'=>'form-control','placeholder'=>'********','required'])!!}
	</div>	
	<div class="form-group">
		{!! Form::label('address','Dirección')!!}
		{!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Dirección exacta','required'])!!}
	</div>
	<div class="form-group">
            {!! Form::label('user_type_id','Tipo de Usuario')!!}
            {!! Form::select('user_type_id',$types,null,['class'=>'form-control','required'])!!}
	</div>	
	<div class="form-group">
		{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}		
	</div>
	{!! Form::close() !!}
		
	
@endsection 