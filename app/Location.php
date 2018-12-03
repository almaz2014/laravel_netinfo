<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'tbllocation';
    protected $fillable = [
        'location', 'address',
    ];

    public function netdev(){
        return $this->hasMany('App\Netdev','loc_id');
    }

    /*
    public static function boot() {
        parent::boot();
        static::deleting(
            function($location) {
            foreach($location->netdev as $nd)
            {
                $nd->delete();
            }
        });
          }
*/

}
