<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile');
    }

    public function profileupdate(Request $request){
        if($request->isMethod('post')){
            $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|unique:users|email',
            'newpassword' => 'required|min:8|max:20|confirmed|string',
            'newpassword_confirmation' => 'required|same:newpassword',
            'bio' => 'max:150',
            'iconimage' => 'image',
            ],
             ['username.required' => 'ユーザーネームは必須項目です。',
             'username.min' => 'パスワードは2文字以上で入力してください。',
             'username.max' => 'パスワードは12文字以内で入力してください。',
             'mail.required' => 'メールアドレスは必須項目です。',
             'mail.email' => 'メールアドレスを正しく入力してください。',
             'mail.min' => 'パスワードは5文字以上で入力してください。',
             'mail.max' => 'パスワードは40文字以下で入力してください。',
             'mail.unique' => 'このメールアドレスは既に使われています。',
             'newpassword.required' => 'パスワードを入力してください',
            'newpassword.min' => 'パスワードは8文字以上、20文字以下で入力してください',
            'newpassword.max' => 'パスワードは8文字以上、20文字以下で入力してください',
            'newpassword.confirmed' => '確認パスワードが一致していません',
            'newpassword_confirmation.required' => '確認パスワードを入力してください',
            'newpassword.alpha_num' => 'パスワードは半角数字で入力してください',
            ]);
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $user->bio = $request->input('bio');
            \DB::table('users') //usersテーブルをここで更新
          ->where('id', $id)//これがないと全てのユーザー情報上書きされてしまう
          ->update([
              'username' => $user->username,
              'mail' => $user->mail,
              'password' => $user->password,
              'bio' => $user->bio,
          //    'images' => $user->images,
          ]);
        }
          return redirect('/top');
    }


    public function search(Request $request){
        $users = User::get();
        //↑usersテーブルを管理するUserモデルに情報をもらう。User.phpは管理者。
        //上にuseで書かなきゃダメ

        $keyword = $request->input('keyword');
        $query = User::query();

        if(!empty($keyword)){
            $query->where('username','LIKE',"%{$keyword}%");
            }

        $users = $query->get();

        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
        //↑bladeに持ってく[]のものを
    }

    //public function searching(Request $request)
    //{
        //$keyword = $request->input('keyword');
        //$query = Post::query();
        //$users = Post::get();

        //if(!empty($keyword)){
            //$users->where('title','LIKE',"%{$keyword}%");
        //}else{
		//$users = Post::all();
        //}

        //return view('users.search', compact('users', 'keyword'));

    //}
}
