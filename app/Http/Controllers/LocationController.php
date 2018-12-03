<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::paginate(10);
        return view('location.index',compact('locations'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('location.create');
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
        $request->validate([
            'location' => 'required|unique:tbllocation',
            'address' => 'required',
        ]);
        Location::create($request->all());
        return redirect()->route('loc.index')->with('success','Location added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $loc=Location::find($id);
        //if ($post)
        return view('location.show')->with('location',$loc);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $location=Location::find($id);

        return view('location.edit')->with('location',$location);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request,[
            'location' => 'required|unique:tbllocation'. ',id,' . $id,
            'address' => 'required'
        ]);
        $loc = Location::find($id);

        $loc ->location = $request->input('location');
        $loc->address=$request->input('address');
        $loc->save();
        return redirect('/loc')->with('success','Location Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $loc = Location::find($id);
        if (count($loc->netdev)>0) {

            return redirect('/loc')->with('error', 'Location NOT Removed, it has netdevs');
        } else {

        $loc->delete();
        return redirect('/loc')->with('success', 'LocationRemoved');
    }

    }
}
