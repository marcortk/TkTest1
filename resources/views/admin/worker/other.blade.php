@extends('admin.main')

@section('title','Otros')

@section('content')
    @if($item ==NULL)
        No se le asignó ningun item
    @else
    <table class="table table-striped" >
        <thead >
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Reportar Avería</th>
        </thead>
        <tbody>
            <td>{{$item->cod}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td><a href="{{route('worker.damaged',$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a></td>
        </tbody>
    </table>
    @endif
@endsection