@extends('admin.main')

@section('title','Lista de usuarios')
    
@section('content')
<a href="{{route('tk.users.create')}}" class="btn btn-info">Registrar nuevo usuario</a>
    <table class="table table-striped">
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
                        @if($user->userType->name=='Administrador')
                            <span class="label label-danger">{{$user->userType->name}}</span>
                        @else
                            <span class="label label-primary">{{$user->userType->name}}</span>  
                        @endif  
                    </td>                   
                </tr>
            @endforeach
        </tbody>
    </table>
    {!!$users->links()!!}

@endsection