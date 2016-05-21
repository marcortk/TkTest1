@extends('admin.main')

@section('title','Registrar nueva laptop')

@section('content')
    {!! Form::open(['route'=>'tk.items.laptops.store','method'=>'POST']) !!}    
    <div class="form-group">
        {!! Form::label('trademark','Marca')!!}
        {!! Form::text('trademark',null,['class'=>'form-control','placeholder'=>'Marca','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('model','Modelo')!!}
        {!! Form::text('model',null,['class'=>'form-control','placeholder'=>'Modelo','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('capacity','Capacidad(GB)')!!}
        {!! Form::text('capacity',null,['class'=>'form-control','placeholder'=>'Capacidad','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('ram','Memoria(GB)')!!}
        {!! Form::text('ram',null,['class'=>'form-control','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('price','Precio(S/.)')!!}
        {!! Form::text('price',null,['class'=>'form-control','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}      
    </div>
    {!! Form::close() !!}
@endsection