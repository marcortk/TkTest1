@extends('admin.main')

@section('title','Lista de libros')

@section('content')
    <a href="{{route('tk.items.books.create')}}" class="btn btn-info">
    Registrar nuevo libro
    <span class="glyphicon glyphicon-book"></span></a>
    <!--INICIO BUSCADOR-->
    {!!Form::open(['route'=>'tk.items.books.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
        <div class="input-group">
            
            {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar Libro..','aria-describedby'=>'search'])!!}
            <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
        </div>
    {!!Form::close()!!}
        <!--FIN BUSCADOR-->
    <hr>
    <table class="table table-striped">
        <thead >
            <th>Código</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Genero</th>
            <th>Idioma</th>
            <th>Año de Publicación</th>
            <th>Propietario</th>
            <th>Asignar</th>
        </thead>
        <tbody>
            @foreach($items as $item)
                    <tr>
                        <td>{{$item->cod}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->author}}</td>
                        <td>{{$item->genre}}</td>
                        <td>{{$item->language}}</td>
                        <td>{{$item->p_date}}</td>
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