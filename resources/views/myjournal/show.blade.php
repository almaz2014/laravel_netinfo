@extends('layouts.app')
@section('content')
    <table class="table table-striped">
        <tr>
                <th>dev1</th>
                <th>dev2</th>
        <th></th>
            <th></th>
        </tr>
        <tr>
        <td>{{$myjournal->netdev1->srcport}}</td>
        <td>{{$myjournal->netdev2->srcport}}</td>
            <td><a href="{{url('/journal/'.$myjournal->id.'/edit')}}" class="btn btn-info">Edit</a></td>
            <td>
                {!! Form::open(['action'=>['JournalController@destroy',$myjournal->id],'method'=>'POST','class'=>'mr-auto']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
            </td>
        </tr>
    </table>
@endsection