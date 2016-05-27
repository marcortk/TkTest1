@extends('admin.main')

@section('title','Propietarios del item')

@section('content')
    @if($users==NULL)
        No ha sido asignado aun.
    @else
        <h2>Propietario actual</h2>
        @if($user ==NULL)
            No tiene propietario.
         @else
            {{$user->name}}
        @endif
        <h2>Propietarios Anteriores</h2>
        @foreach($users as $us)
            @if($user!=NULL)
                @if($us->name != $user->name)
                    {{$us->name}}
                @endif
            @else
                {{$us->name}}
            @endif
        @endforeach
    @endif
@endsection 
