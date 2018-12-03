<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myjournal extends Model
{
    protected $table = 'tbljournal';
    protected $fillable = [
        'dev1', 'dev2',
    ];
    //
    public function netdev1(){
        return $this->belongsTo('App\Myport','dev1','id');
    }
    public function netdev2(){
        return $this->belongsTo('App\Myport','dev2','id');
    }
    //
}
