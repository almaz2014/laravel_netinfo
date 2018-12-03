
@extends('layouts.app')

@section('content')
    <h1>Редактировать</h1>
    {!! Form::open(['action' => ['JournalController@update',$myjournal->id],'method'=>'POST']) !!}

    <div class="form-group">
        {{Form::label('dev1','Network Device-Port Src',['class'=>'input-group-prepend'])}}
        {{Form::select('dev1', array('' => 'Please select one option') + $myports, $myjournal->dev1,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('dev2','Network Device-Port Dst',['class'=>'input-group-prepend'])}}
        {{Form::select('dev2', array('' => 'Please select one option') + $myports, $myjournal->dev1,['class'=>'form-control'])}}
    </div>


    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}




@endsection