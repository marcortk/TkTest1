@extends('admin.main')

@section('title','Lista de libros')


@section('content')
	
	<table class="table table-striped" >
		
		<thead >
			<th>Código</th>
			<th>Titulo</th>
			<th>Autor</th>
			<th>Genero</th>
			<th>Idioma</th>
			<th>Año de Publicación</th>
			
		</thead>
		<tbody>
			@foreach($items as $item)	
				@if($item->item_type->name=="Books")
					<tr>
						<td>{{$item->cod}}</td>
						<td>{{$item->title}}</td>
						<td>{{$item->author}}</td>
						<td>{{$item->genre}}</td>
						<td>{{$item->language}}</td>
						<td>{{$item->p_date}}</td>

					</tr>
				
				@endif		
			@endforeach
		</tbody>
	</table>
	{!!$items->links()!!}

@endsection