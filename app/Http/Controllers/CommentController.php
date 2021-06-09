<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    //
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
        $input['request_model_id'] = $request->request_model_id;
        $input['body'] = $request->body;
        //$input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back();
    }
}
