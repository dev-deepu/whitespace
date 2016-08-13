<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Twitter;

use App\Tweets;

use Response;

use View;

use Carbon\Carbon;

class TweetsController extends Controller
{
    public function get(Request $request)
    {
    	$tweets = Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan', 'count' => 10]);
    	$input = [];
    	
    	foreach ($tweets as $key => $tweet) {
    		$input['twitter_id'] = $tweet->id;
    		$input['twitter_user'] = $tweet->user->id;
    		$input['name'] = $tweet->user->name;
    		$input['screen_name'] = $tweet->user->screen_name;
    		$input['image'] = $tweet->user->profile_image_url;
    		$input['text'] = $tweet->text;
    		$input['created_at'] = new Carbon($tweet->created_at);

    		$input['created_at']->timezone = 'Asia/Kolkata';

    		Tweets::firstOrCreate($input);
    	}

    	$tweets = Tweets::latest()->paginate(5);
    	
    	if ($request->ajax()) {
            return Response::json(View::make('tweets', array('tweets' => $tweets))->render());
        }

    }
}
