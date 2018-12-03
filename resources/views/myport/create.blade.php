@extends('layouts.app')

@section('content')
    <h1>Новый порт</h1>



    {!! Form::open(['action' => 'PortController@store','method'=>'POST','class'=>'form-horizontal']) !!}


    <div class="form-group">

        {{Form::label('ndev_id','Network Device',['class'=>'input-group-prepend'])}}

        {{Form::select('ndev_id', array('' => 'Please select one option') + $netdevs, '',['class'=>'form-control'])}}

    </div>

    <div class="form-group">
        {{Form::label('srcport','Port')}}
        {{Form::text('srcport','',['class'=>'form-control','placeholder'=>'Enter port here ...'])}}
    </div>



    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}


    

@endsection