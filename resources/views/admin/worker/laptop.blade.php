@extends('admin.main')

@section('title','Laptop')

@section('content')
    @if($laptop ==NULL)
        No se le asignó ninguna laptop
    @else
    <table class="table table-striped">
        <thead >
            <th>Código</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ram(GB)</th>
            <th>Capacidad</th>
            <th>Precio</th>
            <th>Reportar Avería</th>
        </thead>
        <tbody>
         <tr>
             <td>{{$laptop->cod}}</td>
             <td>{{$laptop->trademark}}</td>
             <td>{{$laptop->model}}</td>
             <td>{{$laptop->ram}}</td>
             <td>{{$laptop->capacity}}</td>
             <td>{{$laptop->price}}</td>
             <td><a href="{{route('worker.damaged',$laptop->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a></td>
         </tr> 
        </tbody>
    </table>
    @endif
    @if($mouse ==NULL)
        No se le asignó ningun mouse
    @else
    <table class="table table-striped">
        <thead >
            <th>Código</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Reportar Avería</th>
        </thead>
        <tbody>
         <tr>
             <td>{{$mouse->cod}}</td>
             <td>{{$mouse->trademark}}</td>
             <td>{{$mouse->price}}</td>
             <td><a href="{{route('worker.damaged',$mouse->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a></td>
         </tr> 
        </tbody>
    </table>
    @endif
@endsection