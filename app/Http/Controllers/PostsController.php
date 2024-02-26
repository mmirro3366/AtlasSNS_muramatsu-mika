<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facedes\Auth;
use Auth;
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
        if($request->isMethod('post')){
            $request->validate([
                'newPost' => 'required|min:1|max:150',
            ],
            ['newPost.required' => '投稿内容は必須項目です。',
             'newPost.max' => '投稿内容は150文字以内で入力してください。',
        ],);

        //投稿フォームに書かれた投稿を受け取る
        $post=$request->input('newPost');
        $user_id=Auth::user()->id;
        //dd($user_id);

        //投稿の登録
        //Postテーブルの'user_id','post'に変数を当てはめる
        //↓postはpostphpにも行く
        Post::create([
            'user_id'=>$user_id,
            'post'=>$post,
            'created_at'=>$created_at,
        ]);
        return redirect('/top');
    }
    return view('posts.index');
}

    public function postUpdate(Request $request)
    {
        $id=$request->input('id');
        $up_post=$request->input('upPost');
        //dd($request);
        Post::where('id',$id)->update(['post'=>$up_post]);

        return redirect('/top');
    }
    public function delete($id)
    {
        \DB::table('posts')
        ->where('id',$id)
        ->delete();

        return redirect('/top');
    }
}
