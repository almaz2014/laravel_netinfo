@extends('layouts.app')

@section('content')
<table class="table table-striped">
<tr>
    <th>DeviceSRC</th>
    <th>DeviceDST</th>
    <th></th>
</tr>
    @foreach($myjournals as $myjournal)
<tr>
    <td>{{$myjournal->netdev1->netdev->hostname }} ( {{$myjournal->netdev1->srcport }} )</td>
    <td>{{$myjournal->netdev2->netdev->hostname }} ( {{$myjournal->netdev2->srcport }} )</td>
    <td><a  class="btn btn-info" href="{{url('/journal/'.$myjournal->id )}}">Show</a></td>
</tr>
    @endforeach


</table>
{{$myjournals->links()}}




@endsection