@extends('admin.main')

@section('title','Lista de mouses')

@section('content')
    <a href="{{route('tk.items.mouses.create')}}" class="btn btn-info">Registrar nuevo mouse<span class="glyphicon glyphicon-apple"></span></a>
    <table class="table table-striped" >    
        <thead >
            <th>Código</th>
            <th>Marca</th>
            <th>Propietario</th>
            <th>Asignar</th>
        </thead>
        <tbody>
            @foreach($items as $item)   
                    <tr>
                        <td>{{$item->cod}}</td>
                        <td>{{$item->trademark}}</td>
                        <td><a href="{{route('tk.items.users',$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a></td>
                        <td><a href="{{route('tk.items.assign',$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span></a></td>
                    </tr>   
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!!$items->render()!!}
    </div>
@endsection