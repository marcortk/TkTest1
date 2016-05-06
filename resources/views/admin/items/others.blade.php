@extends('admin.main')

@section('title','Lista de items ')


@section('content')

	<table class="table table-striped" >
		
		<thead >
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripción</th>

			
		</thead>
		<tbody>
			@foreach($items as $item)	
				@if($item->item_type->name=="Others")
					<tr>
						<td>{{$item->cod}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->description}}</td>
					</tr>
				
				
				@endif		
			@endforeach
		</tbody>
	</table>
	{!!$items->links()!!}

@endsection