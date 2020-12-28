<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Comment;
use Auth;
class DetailController extends Controller
{
    public function getDetail($id){
        $products = Product::find($id);
        $comment = Comment::where('pro_id','=',$id)->get();
        $count_cmt = Comment::where('pro_id','=',$id)->get()->count();
        $arr = [
            'id'=>$id,
            'data'=>$products,
            'cmt'=>$comment,
            'count_cmt'=>$count_cmt
        ];
        return view('frontend.detail',$arr);
    }
    public function postDetail($id,Request $request){
        $comment = new Comment;
        $content = $request->comment;
        $comment->pro_id = $id;
        $comment->email = Auth::user()->email;
        $comment->comment = $content;
        $comment->save();
        return back();
    }
}
