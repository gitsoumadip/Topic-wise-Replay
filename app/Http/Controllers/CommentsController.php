<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function addComment(Request $request)
    {
        $insertArray = [
            'comment' => $request->comments,
            'topic_id'=>$request->post_id,
            'user_id'=>$request->user_id
        ];

        if(isset($request->parent_id)){
            $insertArray['parent_id'] = $request->parent_id;
        }

        $addComment=Comments::create($insertArray);

        return back();
    }
}
