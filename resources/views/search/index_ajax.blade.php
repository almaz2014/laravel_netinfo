@extends('layouts.app2')

@section('content')
@if(count($result)>0)
    <ul>
         @foreach($result as $sitem)
                <li>{{$sitem->netdev->hostname}} | {{$sitem->srcport}}</li>
            <ul>
            @foreach($sitem->myjournal_dev1 as $bitem)
                    <li>{{$bitem->netdev1->netdev->location->location}}  | {{$bitem->netdev1->netdev->hostname}} | {{$bitem->netdev1->srcport}} - {{$bitem->netdev2->netdev->hostname}} | <b>{{$bitem->netdev2->srcport}}</b></li>
            @endforeach
            </ul>
            <ul>
                @foreach($sitem->myjournal_dev2 as $bitem)
                    <li>{{$bitem->netdev1->netdev->location->location}}  | {{$bitem->netdev1->netdev->hostname}} | {{$bitem->netdev1->srcport}} - {{$bitem->netdev2->netdev->hostname}} | <b>{{$bitem->netdev2->srcport}}</b></li>
                @endforeach
            </ul>
         @endforeach
    </ul>
    @else
    <h1>Not found</h1>
    @endif
@endsection