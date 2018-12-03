<?php

namespace App\Http\Controllers;

use App\Myjournal;
use App\Myport;
use App\Netdev;
use Illuminate\Http\Request;

class SearchMeController extends Controller
{
    //
    public function find(Request $request){

        $messages = [
            'search'    => 'Введите текст для поиска',
            'dev2.required'    => 'Choose Device Port #2',
        ];

        $this->validate($request, [
            'search' => 'bail|required',

        ],$messages);

        //$id=Netdev::find($request->search);
        //$result=Netdev::where('hostname', $request->input('company'))->get();
        //$result=Netdev::where('hostname', 'LIKE','%'.$request->input("search").'%')->orWhere('model','LIKE','%'.$request->input('search').'%')->get();

        $result=Myport::where('srcport','LIKE','%'.$request->input("search").'%')->get();

        //$res=Myjournal::where('dev1','=',App\Myport::where())->orWhere('dev2','=',$result->id)->get();
        //$result=Myport::find($id);
        return view('search.index')->with('result',$result);
    }
}
