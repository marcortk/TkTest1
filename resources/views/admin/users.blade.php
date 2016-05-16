@extends('admin.main')

@section('title','Propietarios del item')

@section('content')
	<h2>Propietario actual</h2>
	@if($user!=null)
		<div>{{$user->name}}</div>
	@endif
	<h2>Propietarios anteriores</h2>
	@foreach($users as $user1)
		@if($user1->name!=$user->name)
			<div>{{$user1->name}}</div>

		@endif
	@endforeach

@endsection