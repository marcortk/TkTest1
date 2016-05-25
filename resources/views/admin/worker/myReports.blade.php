
@extends('admin.main')

@section('title','Lista de reportes')

@section('content')
    @if($items==NULL)
        No tiene ningun reporte de avería.
    @else
    <table class="table table-striped" >
        <head>
            <th>Código</th>
            <th>Tipo de Item</th>
            <th>Descripción</th>
        </head>
        <body>
        @foreach($items as $item)
            <tr>
                <td>{{$item->cod}}</td>
                <td>{{$item->itemType->name}}</td>
                <td>{{$item->pivot->description}}</td>
            </tr>
        @endforeach
        </body>
    @endif
@endsection