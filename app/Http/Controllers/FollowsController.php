<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Auth;
use DB;


class FollowsController extends Controller
{
    //
    public function followList(){
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $users = \DB::table('users')->whereIn('id', $following_id)->get();
        $post = Post::with('user')->whereIn('user_id', $following_id)->get();
        //dd($users);

        return view('follows.followList', compact('users','post'));

    }
    public function followerList(){
        //ログインユーザーがフォローしてる人を表示
        $follows = Auth::User()->follows()->get();
        $followed_id = Auth::user()->followUsers()->pluck('following_id');
        $users = \DB::table('users')->whereIn('id', $followed_id)->get();
        $post = Post::with('user')->whereIn('user_id', $followed_id)->get();

        return view('follows.followerList', compact('users','post','follows'));
    }
    //フォローするしない
    public function follow(User $user) {

        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user) {

        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
}
