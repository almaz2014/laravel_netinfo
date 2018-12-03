
@extends('layouts.app')

@section('content')
    <h1>Редактировать</h1>
    {!! Form::open(['action' => ['PortController@update',$myport->id],'method'=>'POST']) !!}

    <div class="form-group">

        {{Form::label('ndev_id','Network dev',['class'=>'input-group-prepend'])}}

        {{Form::select('ndev_id', array('' => 'Please select one option') + $netdevs, $myport->ndev_id,['class'=>'form-control'])}}

    </div>

    <div class="form-group">
        {{Form::label('srcport','Port')}}
        {{Form::text('srcport',$myport->srcport,['class'=>'form-control','placeholder'=>'Enter port here ...'])}}
    </div>


    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}




@endsection