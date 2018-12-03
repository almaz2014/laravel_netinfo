<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myport extends Model
{
    //
    protected $table = 'tblports';
    protected $fillable = [
        'ndev_id', 'srcport',
    ];
    //
    public function netdev(){
        return $this->belongsTo('App\Netdev','ndev_id');
    }

    public function myjournal_dev1(){
        return $this->hasMany('App\Myjournal','dev1','id');
    }
    public function myjournal_dev2(){
        return $this->hasMany('App\Myjournal','dev2','id');
    }

}
