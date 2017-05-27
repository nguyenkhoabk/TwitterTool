<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Hashtag;
use App\Accounts;
class TwitterController extends Controller
{

    public function index(){
    	return view('twitter.index');
    }

    public function listAll(){
        $hashtag =DB::table('hashtag')->paginate(5);
      
        return view('twitter.list',['hashtag'=>$hashtag]);
    }
    public function store_hashtag(Request $request){
		$data = $request->input('hashtag');
		$hashtag = new Hashtag();
		$hashtag->hashtag_name = $data;
		$hashtag->release_flag = 0;
		$hashtag->save();
        return redirect('/twitter/list');
    }

    public function autoRun(){
        $data = new Hashtag();
        $hashtags_array = DB::table('hashtag')->select('id','hashtag_name')->where('release_flag', 0)->get();
        foreach($hashtags_array as $hashtag){
            $this->findAndFollowTwitterUser($hashtag);
        }   
    }

    public function findAndFollowTwitterUser($hashtag){
    	$CONSUMER_KEY = 'M96pa93QmQ7CLIZu7dzszTwnT';
        $CONSUMER_SECRET = 'i0VWryWU0UyROhtPA09mXbj5oXeh3s0XZtGIRC7sDzP2OH1rYB';
        $access_token = '868105737901293570-JqplXedg8MUE7zoTYh0pE6aOi4Hel5K';
        $access_token_secret = 'yndASsva4npAnoE73v48xGoQ9KZOmBhxM5SN0VznkrWuR';
    	$twitter = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token, $access_token_secret);
        

        DB::table('hashtag')->where('id', $hashtag->id)->update(['release_flag' => 1]);

        $q ="%23".$hashtag->hashtag_name;
    	//Find tweets by hashtag
    	$data = $twitter->get("search/tweets",["q"=>$q]);

    	if($data){
    		foreach($data->statuses as $key => $tw){
            // Follow user
            $add_friend = $twitter->post("friendships/create",["user_id"=>$tw->user->id,"follow"=> "true"]);
            $account = new Accounts();
       		$account->store($tw, $hashtag->id);
   			}
   			return redirect('twitter/following');
    	}
    	
    }

    public function follow(){
    	$accounts = DB::table('accounts')->paginate(5);
    	return view('twitter.follow',['accounts' => $accounts]);
    }
}
