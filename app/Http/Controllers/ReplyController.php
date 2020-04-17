<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    public function store( Question $question,Request $request)
    {
       $reply = $question->replies()->create($request->all());
        return response(['reply' => new ReplyResource($reply)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show( Question $question ,Reply $reply)
    {
        return new ReplyResource($reply);
    }

    public function update(Question $question ,Request $request ,Reply $reply)
    {
        $reply->update($request->all());
        return response('updated');
    }

    public function destroy(Question $question , Reply $reply)
    {
        $reply->delete();
        return response('deleted');
    }
}
