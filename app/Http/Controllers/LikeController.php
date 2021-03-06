<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
    }
    public function likeIt(Reply $reply){
       $reply->like()->create([
           'user_id' => '1'
       ]);
       return response('created');
    }
    public function unlikeIt( Reply $reply){
       $reply->like()->where('user_id','1')->delete();
       return response('deleted');
    }

}
