@extends('admin.main')

@section('title','Registrar nuevo artículo')

@section('content')
	{!! Form::open(['route'=>'tk.items.others.store','method'=>'POST']) !!}	
	<div class="form-group">
		{!! Form::label('name','Nombre ')!!}
		{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del artículo','required'])!!}
	</div>
	<div class="form-group">
		{!! Form::label('description','Descripción')!!}
		{!! Form::textarea('description',null,['class'=>'form-control','required'])!!}
	</div>
	<div class="form-group">
		{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}		
	</div>
	{!! Form::close() !!}
@endsection