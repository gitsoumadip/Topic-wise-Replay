<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function addQuestion(Request $request)
    {
        // return $request;
        try {
            Topic::create([
                'forum_id' => $request->forum_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return response()->json(['success' => true, 'msg' => 'Event Add Successfully']);
        } catch (Exception $e) {
            return  response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function viewQuestion(Request $request, $topic_id)
    {
        $topicDetails = Topic::with('forum')->where( 'id', $topic_id)->first();
        $getReplies = function($parent_id){
            return Comments::with('user')->where('parent_id', $parent_id)->get();
        };
        return view('pages.question.addPost', compact('topicDetails','getReplies'));
    }
}
