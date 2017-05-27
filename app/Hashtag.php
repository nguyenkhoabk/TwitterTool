<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    //
    protected $table = 'hashtag';
    public function accounts(){
    	return $this->hasMany('App\Accounts');
    }
}
