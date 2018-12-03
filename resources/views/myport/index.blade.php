@extends('layouts.app')

@section('content')
<table class="table table-striped">
<tr>
    <th>NetworkDev</th>
    <th>Port</th>

    
    <th></th>


</tr>
    @foreach($myports as $myport)
<tr>

    <td>{{$myport->netdev->hostname }}</td>
    <td>{{$myport->srcport}} (Records in journal: {{ count($myport->myjournal_dev1) + count($myport->myjournal_dev2)  }})</td>




    <td><a  class="btn btn-info" href="{{url('/port/'.$myport->id )}}">Show</a></td>

</tr>
    @endforeach


</table>
{{$myports->links()}}




@endsection