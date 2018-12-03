@extends('layouts.app')
@section('content')


    <h1>Поиск по Сеетевому журналу</h1>
    {!! Form::open(['action' => 'SearchMeController@find','method'=>'get','class'=>'form-horizontal']) !!}

    <div class="form-group">
        {{Form::label('search','Search')}}
        {{Form::text('search','',['class'=>'form-control','placeholder'=>'Enter search text here ...'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

            @endsection