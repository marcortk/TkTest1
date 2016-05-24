@extends('admin.main')

@section('title','Registrar nuevo mouse')

@section('content')
	{!! Form::open(['route'=>'tk.items.mouses.store','method'=>'POST']) !!}
	    <div class="form-group">
	        {!! Form::label('trademark','Marca')!!}
	        {!! Form::text('trademark',null,['class'=>'form-control','placeholder'=>'Marca','required'])!!}
	    </div>
	    <div class="form-group">
	        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}      
	    </div>
	{!! Form::close() !!}
@endsection