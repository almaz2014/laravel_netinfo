
@extends('layouts.app')

@section('content')
    <h1>Редактировать</h1>
    {!! Form::open(['action' => ['NetdevController@update',$netdev->id],'method'=>'POST']) !!}

    <div class="form-group">

        {{Form::label('loc_id','Location',['class'=>'input-group-prepend'])}}

        {{Form::select('loc_id', array('' => 'Please select one option') + $locs, $netdev->loc_id,['class'=>'form-control'])}}

    </div>

    <div class="form-group">
        {{Form::label('hostname','hostname')}}
        {{Form::text('hostname',$netdev->hostname,['class'=>'form-control','placeholder'=>'Enter hostname here ...'])}}
    </div>

    <div class="form-group">
        {{Form::label('model','Model')}}
        {{Form::text('model',$netdev->model,['class'=>'form-control','placeholder'=>'model text goes here ...'])}}
    </div>

    <div class="form-group">
        {{Form::label('ip','Ip')}}
        {{Form::text('ip',$netdev->ip,['class'=>'form-control','placeholder'=>'ip text goes here ...'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}




@endsection