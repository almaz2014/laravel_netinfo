@extends('layouts.app')

@section('content')
    <h1>Создать сообщение</h1>
    {!! Form::open(['action' => 'LocationController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('location','Location')}}
        {{Form::text('location','',['class'=>'form-control','placeholder'=>'location'])}}
    </div>

    <div class="form-group">
        {{Form::label('address','Address')}}
        {{Form::textarea('address','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'address text goes here ...'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}


    

@endsection