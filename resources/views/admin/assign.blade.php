@extends('admin.main')

@section('title','Asignar artículo')

@section('content')
	{!! Form::open(['route'=>array('tk.items.update',$item->id),'method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('users','Usuario')!!}
			{!! Form::select('users[]',$users,null,['class'=>'form-control select-category','required'])!!}
		</div>
		<div class="form-group">
			{!!Form::submit('Asignar',['class'=>'btn btn-primary'])!!}			
		</div>
	{!! Form::close() !!}
@endsection