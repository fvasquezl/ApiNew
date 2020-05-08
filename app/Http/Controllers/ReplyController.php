<?php

namespace App\Http\Controllers;

use App\Model\Question;
use App\Model\Reply;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Question  $question
     * @return void
     */
    public function index(Question $question)
    {
        return $question->replies;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Question  $question
     * @param  \Illuminate\Http\Request  $request
     * @return Application|ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all());

        return response(['reply'=> $reply], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Question  $question
     * @param  Reply  $reply
     * @return Reply
     */
    public function show(Question $question, Reply $reply)
    {
        return $reply;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Question  $question
     * @param  Reply  $reply
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
