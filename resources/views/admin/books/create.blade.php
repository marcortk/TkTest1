@extends('admin.main')

@section('title','Registrar nuevo libro')

@section('content')
    {!! Form::open(['route'=>'tk.items.books.store','method'=>'POST']) !!}  
    <div class="form-group">
        {!! Form::label('title','Titulo')!!}
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del libro','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('author','Autor')!!}
        {!! Form::text('author',null,['class'=>'form-control','placeholder'=>'Nombre del autor','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('language','Idioma')!!}
        {!! Form::text('language',null,['class'=>'form-control','placeholder'=>'Idioma','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('genre','Genero')!!}
        {!! Form::text('genre',null,['class'=>'form-control','placeholder'=>'Genero','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('p_date','Año de Publicación')!!}
        {!! Form::text('p_date',null,['class'=>'form-control','placeholder'=>'Año','required'])!!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}      
    </div>
    {!! Form::close() !!}
@endsection