 @extends('admin.main')

@section('title','Registrar una avería')

@section('content')
	{!! Form::open(['route'=>array('worker.report',$id),'method'=>'POST']) !!}

    <div class="form-group">
        {!! Form::label('des','Descripción')!!}
    </div>
    <div>
        <input name='des' >
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection