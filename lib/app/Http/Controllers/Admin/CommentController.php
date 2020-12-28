<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
class CommentController extends Controller
{
    public function getCommentShow(){
        $count_comment = Comment::all()->count();
        $data = Comment::where('comment_id','>',0)->orderBy('comment_id','desc')->get();
        $arr = [
            'count_comment'=>$count_comment,
            'data'=>$data,
        ];
        return view('backend.comment',$arr);
    }
    public function getCommentDelete($id){
        $cmt = new Comment;
        $cmt->where('comment_id',$id)->delete();
        return back()->withInput()->with('message','Xóa bình Luận Thành Công');
    }
}
