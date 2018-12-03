<?php

namespace App\Http\Controllers;

use App\Myjournal;
use App\Myport;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $myjournals = Myjournal::orderBy('id','asc')->paginate(10);
        return view('myjournal.index',compact('myjournals'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $myports=Myport::pluck('ndev_id','srcport','id')->toArray();

        //$myportsall=Myport::all();
 $myports=array();
         $myportsall=Myport::all();
            foreach ($myportsall as $item){
                   $val=$item->netdev->hostname.' '.$item->srcport;
                          $key=$item->id;
                                 $myports[$key]=$val;
                                    }

        return view('myjournal.create',compact('myports'));
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
            'dev1.required'    => 'Choose Device Port #1',
            'dev2.required'    => 'Choose Device Port #2',
        ];

        $this->validate($request, [
            'dev1' => 'bail|required',
            'dev2' => 'bail|required|unique:tbljournal,dev2,NULL,id,dev1,'.$request->input('dev1'),
        ],$messages);
        Myjournal::create($request->all());
        return redirect()->route('journal.index')->with('success','Journal item  added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $nd=Myjournal::find($id);
        return view('myjournal.show')->with('myjournal',$nd);
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
        $myports=Port::pluck('ndev_id'.' '.'srcport','id')->toArray();
        $myjournal=Myjournal::find($id);

        return view('myjournal.edit',compact('myjournal','myports'));
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
        $this->validate($request,[
            'dev1' => 'bail|required',
            'dev2' => 'bail|required|unique:tbljournal,dev2,{{$id}},id,dev1,'.$request->input('dev1'),
        ]);

        $loc = Myjournal::find($id);
        $loc ->dev1= $request->input('dev1');
        $loc->dev2=$request->input('dev2');
        $loc->save();
        return redirect('/journal')->with('success','Journal item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loc=Myjournal::find($id);
        $loc->delete();
        return redirect('/journal')->with('success','Journal item  Removed');
    }
}
