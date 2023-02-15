<?php

namespace App\Http\Controllers;

use App\Models\FouramModel;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;

class FouramController extends Controller
{
    //
    public function index()
    {
        $fouramCategory = FouramModel::all();
        // print_r($fouramCategory);
        return view('pages.fouram.index', compact('fouramCategory'));
    }
    public function addFouram(Request $request)
    {
        try {
            // dd($request);
            // print_r($request->title);
            FouramModel::create([
                'title' => $request->title,
                'description' => $request->description
            ]);
            return response()->json(['success' => true, 'msg' => 'Event Add Successfully']);
        } catch (Exception $e) {
            return  response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    // public function

    public function viewTopic(int $forum_id)
    {
        $forumDetails = FouramModel::with('topic')->where('id',$forum_id)->first();
        return view('pages.question.index',compact('forumDetails'));
    }
}
