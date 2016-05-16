@extends('admin.main')

@section('title','Lista de items ')


@section('content')
	<a href="{{route('tk.items.others.create')}}" class="btn btn-info">Registrar nuevo artículo</a>
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
				@if($item->item_type->name=="Others")
					<tr>
						<td>{{$item->cod}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->description}}</td>
						<td><a href="{{route('tk.items.users',$item->id)}}" class="btn btn-warning"></a></td>
						<td><a href="{{route('tk.items.assign',$item->id)}}" class="btn btn-warning"></a></td>
					</tr>
				
				
				@endif		
			@endforeach
		</tbody>
	</table>
	{!!$items->links()!!}

@endsection