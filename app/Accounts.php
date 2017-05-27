<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    //
    public function hashtags()
    {
        return $this->belongsTo('App\Hashtag');
    }
    public function store($data, $hashtag){
	 	$account = new Accounts();
   		$account->account_id = $data->user->name;
   		$account->account_info = $data->user->profile_image_url;
   		$account->hashtag_id = $hashtag;
   		$account->save();
    }
    public function getAll(){
    	$accounts = Accounts::paginate(5);
    	return $accounts;
    }
}
