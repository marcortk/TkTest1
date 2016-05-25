@extends('admin.main')

@section('title','Propietarios del item')

@section('content')
    <h2>Propietario actual</h2>
    @if($flag==false)
    @elseif($user!=null && ($item->damaged==false))
        <div>{{$user->name}}</div>
    @elseif($item->damaged==true)
        <div>Item dañado</div>    
    @endif

    <h2>Propietarios anteriores</h2>
    @if($item->damaged==true || $flag==false)
        <div>{{$user->name}}</div>
    @endif
    @foreach($users as $user1)
        @if($user1->name!=$user->name)
            <div>{{$user1->name}}</div>
        @endif
    @endforeach
@endsection 