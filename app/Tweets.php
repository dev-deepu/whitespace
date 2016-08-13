<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $fillable = ['twitter_id', 'twitter_user', 'name', 'screen_name', 'image', 'text', 'created_at'];
}
