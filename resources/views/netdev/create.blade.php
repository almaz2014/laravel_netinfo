@extends('layouts.app')

@section('content')
    <h1>Новое устройство</h1>



    {!! Form::open(['action' => 'NetdevController@store','method'=>'POST','class'=>'form-horizontal']) !!}


    <div class="form-group">

        {{Form::label('loc_id','Location',['class'=>'input-group-prepend'])}}

        {{Form::select('loc_id', array('' => 'Please select one option') + $locs, '',['class'=>'form-control'])}}

    </div>

    <div class="form-group">
        {{Form::label('hostname','hostname')}}
        {{Form::text('hostname','',['class'=>'form-control','placeholder'=>'Enter hostname here ...'])}}
    </div>

    <div class="form-group">
        {{Form::label('model','Model')}}
        {{Form::text('model','',['class'=>'form-control','placeholder'=>'model text goes here ...'])}}
    </div>

    <div class="form-group">
        {{Form::label('ip','Ip')}}
        {{Form::text('ip','',['class'=>'form-control','placeholder'=>'ip text goes here ...'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}


    

@endsection