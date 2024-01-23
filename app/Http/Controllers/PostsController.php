<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use App\User;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        //Postテーブルからレコード情報を取得
        $list=Post::get();
        //bladeへ返す際にデータを送る
        return view('posts.index',['list'=>$list]);
    }

    //投稿の登録処理
    public function postCreate(Request $request){
        //投稿フォームに書かれた投稿を受け取る
        $post=$request->input('newPost');
        $user_id=Auth::user()->id;
        //投稿の登録
        //Postテーブルの'user_id','post'に変数を当てはめる
        Post::create([
            'user_id'=>$user_id,
            'post'=>$post
        ]);
        return back();
    }
    public function postUpdate(Request $request)
    {
        $id=$request->input('id');
        $up_post=$request->input('upPost');
        Post::where('id',$id)->update
        (['post'=>$up_post]);

        return redirect('/top');
    }
}
