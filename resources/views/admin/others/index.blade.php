@extends('admin.main')

@section('title','Lista de items ')

@section('content')
	<a href="{{route('tk.items.others.create')}}" class="btn btn-info">Registrar nuevo artículo<span class=" glyphicon glyphicon-phone"></span></a>
	<table class="table table-striped" >	
		<thead >
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Propietario</th>
			<th>Asignar</th>		
		</thead>
		<tbody>
			@foreach($items as $item)	
					<tr>
						<td>{{$item->cod}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->description}}</td>
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