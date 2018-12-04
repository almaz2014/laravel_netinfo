<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myport;
use App\Netdev;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $myports = Myport::orderBy('id','asc')->paginate(10);
        return view('myport.index',compact('myports'))->with('i', (request()->input('page', 1) - 1) * 5);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $netdevs=Netdev::pluck('hostname','id')->toArray();
        return view('myport.create',compact('netdevs'));


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
        $messages = [
            'ndev_id.required'    => 'Choose Network Device please',
            'size'    => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute value :input is not between :min - :max.',
            'in'      => 'The :attribute must be one of the following types: :values',
        ];

        $this->validate($request, [
            'ndev_id' => 'bail|required',
            'srcport' => 'bail|required|unique:tblports,srcport,NULL,id,ndev_id,'.$request->input('ndev_id'),
            //check unique value on table "tblports" field "srcport" and ignore id value, here is 'NULL' where id column name is 'id'   and in addition check value of filed 'ndev_id' which has value $request->input(ndev_id)

        ],$messages);

        /*
                $request->validate([
                    'loc_id' => 'required',
                    'hostname' => 'required',
                    'model' => 'required',
                    'ip' => 'required',
                ]);
        */

        Myport::create($request->all());
        return redirect()->route('port.index')->with('success','Port  added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nd=Myport::find($id);
                return view('myport.show')->with('myport',$nd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $netdevs=Netdev::pluck('hostname','id')->toArray();
        $myport=Myport::find($id);

        return view('myport.edit',compact('myport','netdevs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request,[
            'nd_id' => 'bail|required',
            'srcport' => 'bail|required|unique:tblports,srcport,{{$id}},id,ndev_id,'.$request->input('ndev_id'),
             ]);

        $loc = Myport::find($id);
        $loc ->ndev_id = $request->input('ndev_id');
        $loc->srcport=$request->input('srcport');
        $loc->save();
        return redirect('/port')->with('success','Port Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $loc=Myport::find($id);
        if ((count($loc->myjournal_dev1)>0 )||(count($loc->myjournal_dev2)>0)){
            return redirect('/port')->with('error','Port has journal item, please remove items first');
        }
        else{
        $loc->delete();
        return redirect('/port')->with('success','Port device Removed');
    }
        //
    }



}
