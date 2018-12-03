@extends('layouts.app')
@section('content')

    <table class="table table-striped">

        <tr>
                <th>Location</th>
                <th>Address</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
        <td>{{$location->location}}</td>
    <td>{{$location->address}}</td>

            <td><a href="{{url('/loc/'.$location->id.'/edit')}}" class="btn btn-info">Edit</a></td>
            <td>
                {!! Form::open(['action'=>['LocationController@destroy',$location->id],'method'=>'POST','class'=>'mr-auto']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

            </td>

        </tr>
    </table>
@endsection