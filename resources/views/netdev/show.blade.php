@extends('layouts.app')
@section('content')

    <table class="table table-striped">

        <tr>
                <th>Location</th>
                <th>Hostname</th>
            <th>Model</th>
            <th>Ip</th>
        <th></th>
            <th></th>
        </tr>
        <tr>
        <td>{{$netdev->location->location}}</td>
    <td>{{$netdev->hostname}}</td>
            <td>{{$netdev->model}}</td>
            <td>{{$netdev->ip}}</td>
            <td><a href="{{url('/netdev/'.$netdev->id.'/edit')}}" class="btn btn-info">Edit</a></td>
            <td>
                {!! Form::open(['action'=>['NetdevController@destroy',$netdev->id],'method'=>'POST','class'=>'mr-auto']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

            </td>
        </tr>
    </table>
@endsection