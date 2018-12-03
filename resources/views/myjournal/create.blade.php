@extends('layouts.app')

@section('content')
    <h1>Новая запись в журнале</h1>
    {!! Form::open(['action' => 'JournalController@store','method'=>'POST','class'=>'form-horizontal']) !!}
    <div class="form-group">
        {{Form::label('dev1','Network Device-Port Src',['class'=>'input-group-prepend'])}}
        {{Form::select('dev1', array('' => 'Please select one option') + $myports, '',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('dev2','Network Device-Port Dst',['class'=>'input-group-prepend'])}}
        {{Form::select('dev2', array('' => 'Please select one option') + $myports, '',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection