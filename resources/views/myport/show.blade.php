@extends('layouts.app')
@section('content')

    <table class="table table-striped">

        <tr>
                <th>Network dev</th>
                <th>SrcPort</th>

        <th></th>
            <th></th>
        </tr>
        <tr>
        <td>{{$myport->netdev->hostname}}</td>
    <td>{{$myport->srcport}}</td>

            <td><a href="{{url('/port/'.$myport->id.'/edit')}}" class="btn btn-info">Edit</a></td>
            <td>
                {!! Form::open(['action'=>['PortController@destroy',$myport->id],'method'=>'POST','class'=>'mr-auto']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

            </td>
        </tr>
    </table>
@endsection