@extends('layouts.app')

@section('content')
<table class="table table-striped">
<tr>
    <th>Location</th>
    <th>Hostname</th>

    
    <th></th>


</tr>
    @foreach($netdevs as $netdev)
<tr>

    <td>{{$netdev->location->location }}</td>
    <td>{{$netdev->hostname}}</td>




    <td><a  class="btn btn-info" href="{{url('/netdev/'.$netdev->id )}}">Show</a></td>

</tr>
    @endforeach


</table>
{{$netdevs->links()}}




@endsection