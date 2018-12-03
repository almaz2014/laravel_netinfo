<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Netdev extends Model
{
    protected $table = 'tblnetdev';
    protected $fillable = [
        'loc_id', 'hostname','model','ip',
    ];
    //
    public function location(){
        return $this->belongsTo('App\Location','loc_id');
    }

    public function myport(){
        return $this->hasMany('App\Myport','ndev_id');
    }
}
