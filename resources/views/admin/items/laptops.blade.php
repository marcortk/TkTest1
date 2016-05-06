@extends('admin.main')

@section('title','Lista de Laptops')


@section('content')

	<table class="table table-striped" >
		
		<thead >
			<th>Código</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Ram(GB)</th>
			<th>Capacidad</th>
			<th>Precio</th>
			
		</thead>
		<tbody>
			@foreach($items as $item)	
				@if($item->item_type->name=="Laptops")
					<tr>
						<td>{{$item->cod}}</td>
						<td>{{$item->trademark}}</td>
						<td>{{$item->model}}</td>
						<td>{{$item->ram}}</td>
						<td>{{$item->capacity}}</td>
						<td>{{$item->price}}</td>

					</tr>
				
				@endif		
			@endforeach
		</tbody>
	</table>
	{!!$items->links()!!}

@endsection