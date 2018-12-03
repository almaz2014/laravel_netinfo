@extends('layouts.app')

@section('content')

    <ul>
         @foreach($result as $sitem)
                <li>{{$sitem->netdev->hostname}} | {{$sitem->srcport}}</li>
            <ul>
            @foreach($sitem->myjournal_dev1 as $bitem)
                <li>{{$bitem->netdev1->netdev->hostname}} | {{$bitem->netdev1->srcport}} - {{$bitem->netdev2->netdev->hostname}} | {{$bitem->netdev2->srcport}}</li>
            @endforeach
            </ul>
            <ul>
                @foreach($sitem->myjournal_dev2 as $bitem)
                    <li>{{$bitem->netdev1->netdev->hostname}} | {{$bitem->netdev1->srcport}} - {{$bitem->netdev2->netdev->hostname}} | {{$bitem->netdev2->srcport}}</li>
                @endforeach
            </ul>
         @endforeach
    </ul>




@endsection