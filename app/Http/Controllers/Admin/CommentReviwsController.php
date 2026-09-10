<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentReviwsController extends Controller
{
    public function ReviewPage(){
        $data['title'] = 'Customers Comments and Reviews';
        $data['reviews'] = Comment::orderBy('created_at', 'DESC')->get();
        return view('admin.comment-review.index', $data);
    }

    public function FetchComment($id){
        $review = Comment::findOrFail($id);
        if($review){
            return response()->json([
                'status'=>200,
                'review'=>$review,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'msg'=>'Comment ID not Found',
            ]);
        }
    }



    public function DestroyReview(int $review_id){
        $review = Comment::findOrFail($review_id);
        $review->delete();
        return redirect()->back()->with('message', 'Data Deleted Successfully');
    }
}
