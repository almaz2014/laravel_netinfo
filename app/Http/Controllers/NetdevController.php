<?php

namespace App\Http\Controllers;

use App\Netdev;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NetdevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $netdevs = netdev::orderBy('id','asc')->paginate(10);
        return view('netdev.index',compact('netdevs'))->with('i', (request()->input('page', 1) - 1) * 5);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locs=Location::pluck('location','id')->toArray();
        return view('netdev.create',compact('locs'));


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $messages = [
            'loc_id.required'    => 'Choose Location please',
            'size'    => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute value :input is not between :min - :max.',
            'in'      => 'The :attribute must be one of the following types: :values',
        ];

        $this->validate($request, [
            'loc_id' => 'required',
            'hostname' => 'required|unique:tblnetdev',
            'model' => 'required',
            'ip' => 'required|ipv4',
        ],$messages);

/*
        $request->validate([
            'loc_id' => 'required',
            'hostname' => 'required',
            'model' => 'required',
            'ip' => 'required',
        ]);
*/

        Netdev::create($request->all());
        return redirect()->route('netdev.index')->with('success','Network device  added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Netdev  $netdev
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nd=Netdev::find($id);
        return view('netdev.show')->with('netdev',$nd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Netdev  $netdev
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $locs=Location::pluck('location','id')->toArray();
        $netdev=Netdev::find($id);

        return view('netdev.edit',compact('netdev','locs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Netdev  $netdev
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        $this->validate($request,[
            'loc_id' => 'required',
            'hostname' => 'required|unique:tblnetdev'. ',id,' . $id,
            'model' => 'required',
            'ip' => 'required|ipv4'
        ]);

        $loc = Netdev::find($id);
        $loc ->loc_id = $request->input('loc_id');
        $loc->hostname=$request->input('hostname');
        $loc ->model = $request->input('model');
        $loc->ip=$request->input('ip');

        $loc->save();
        return redirect('/netdev')->with('success','Netdev Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Netdev  $netdev
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loc=Netdev::find($id);
        if(count($loc->myport)>0){
            return redirect('/port')->with('error', 'Netdev NOT Removed, it has Ports. Please remove ports to delete Network device');
    } else {
        $loc->delete();
        return redirect('/port')->with('success','Network device Removed');}
        //

        /* $loc = Location::find($id);
        if (count($loc->netdev)>0) {

            return redirect('/loc')->with('error', 'Location NOT Removed, it has netdevs');
        } else {

        $loc->delete();
        return redirect('/loc')->with('success', 'LocationRemoved');
    }
*/
    }
}
