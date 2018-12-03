@extends('layouts.app')

@section('content')
<table class="table table-striped">
<tr>
    <th>Location</th>
    <th>Address</th>
<th></th>


</tr>
    @foreach($locations as $loc)
<tr>

        <td>{{$loc->location}} (number of items: {{count($loc->netdev)}})</td>
    <td>{{$loc->address}}</td>
    <td><a  class="btn btn-info" href="{{url('/loc/'.$loc->id )}}">Show</a></td>

</tr>
    @endforeach


</table>
{{$locations->links()}}




@endsection