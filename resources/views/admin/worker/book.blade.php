@extends('admin.main')

@section('title','Libro')

@section('content')
    @if($item ==NULL )
        No se le asignó ningun libro
    @else
    <table class="table table-striped">
        <thead >
            <th>Código</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Genero</th>
            <th>Idioma</th>
            <th>Año de Publicación</th>
            <th>Reportar Daño</th>
        </thead>
            <td>{{$item->cod}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->author}}</td>
            <td>{{$item->genre}}</td>
            <td>{{$item->language}}</td>
            <td>{{$item->p_date}}</td>
            <td><a href="{{route('worker.damaged',$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a></td>
        <tbody>
        </tbody>
    </table>
    @endif
@endsection