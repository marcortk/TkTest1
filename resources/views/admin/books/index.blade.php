@extends('admin.main')

@section('title','Lista de libros')


@section('content')
	<a href="{{route('tk.items.books.create')}}" class="btn btn-info">Registrar nuevo libro</a>
	<table class="table table-striped" >
		
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
				@if($item->item_type->name=="Books")
					<tr>
						<td>{{$item->cod}}</td>
						<td>{{$item->title}}</td>
						<td>{{$item->author}}</td>
						<td>{{$item->genre}}</td>
						<td>{{$item->language}}</td>
						<td>{{$item->p_date}}</td>
						<td><a href="{{route('tk.items.users',$item->id)}}" class="btn btn-warning"></a></td>
						<td><a href="{{route('tk.items.assign',$item->id)}}" class="btn btn-warning"></a></td>

					</tr>
				
				@endif		
			@endforeach
		</tbody>
	</table>
	{!!$items->links()!!}

@endsection 