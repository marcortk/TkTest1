@extends('admin.main')

@section('title','Lista de usuarios')


@section('content')

	<table class="table table-striped" >
		
		<thead >
			
			<th>Nombre</th>
			<th>Correo</th>
			<th>Dirección</th>
			<th>Tipo</th>

		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->address}}</td>
										<td>
						@if($user->user_type->name=='Administrador')
							<span class="label label-danger">{{$user->user_type->name}}</span>
						@else
							<span class="label label-primary">{{$user->user_type->name}}</span>	
						@endif	
					</td>
				
								
				</tr>
			@endforeach
		</tbody>
	</table>
	{!!$users->links()!!}

@endsection