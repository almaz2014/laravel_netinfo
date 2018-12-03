
@extends('layouts.app')

@section('content')
    <h1>Редактировать сообщение</h1>
    {!! Form::open(['action' => ['LocationController@update',$location->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('location','Location')}}
        {{Form::text('location',$location->location,['class'=>'form-control','placeholder'=>'location'])}}
    </div>
    <div class="form-group">
        {{Form::label('address','Address')}}
        {{Form::textarea('address',$location->address,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'address text goes here ...'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}




@endsection