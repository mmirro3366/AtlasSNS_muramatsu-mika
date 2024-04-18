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
            'mail' => 'min:5|max:40|unique:users,mail->ignore(Auth::id())',
            'password' => 'required|min:8|max:20|confirmed|string',
            'password_confirmation' => 'required|same:password',
            'bio' => 'max:150',
            'images' => 'sometimes|image',
            ],
            ['username.required' => 'ユーザーネームは必須項目です。',
            'username.min' => 'パスワードは2文字以上で入力してください。',
            'username.max' => 'パスワードは12文字以内で入力してください。',
            // 'mail.required' => 'メールアドレスは必須項目です。',
            'mail.email' => 'メールアドレスを正しく入力してください。',
            'mail.min' => 'パスワードは5文字以上で入力してください。',
            'mail.max' => 'パスワードは40文字以下で入力してください。',
            'mail.unique' => 'このメールアドレスは既に使われています。',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上、20文字以下で入力してください',
            'password.max' => 'パスワードは8文字以上、20文字以下で入力してください',
            'password.confirmed' => '確認パスワードが一致していません',
            'password_confirmation.required' => '確認パスワードを入力してください',
            'password.alpha_num' => 'パスワードは半角数字で入力してください',
            'bio.max' => '自己紹介は150文字以内で入力してください。',
            'images.image' => '画像ファイルを選択してください',
            ]);
            $id=Auth::user()->id;
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $password_confirmation = $request->input('password_confirmation');
            $bio = $request->input('bio');

            if(isset($request->images)){
                $image = $request->file('images')->getClientOriginalName();
            //dd($image);
                $request->file('images')->store('public/storage/' . $image);
            }
            //dd($username,$mail,$password,$password_econfirmation,$bio,$id);
            //↓これがないと全てのユーザー情報上書きされてしまう
          User::where('id', $id)->update([
              'username' => $username,
              'mail' => $mail,
              'password' => bcrypt($password),
              //'password_confirmation' => bcrypt($password_confirmation),
              'bio' => $bio,
            //   'images' => $image,
          ]);
        }
          return redirect('/top');
    }

    public function userProfile($id){
        $user = Auth::user();
        $userprofile = User::where('id', $id)->first();
        //Authはログインしてる情報もってくる
        //firstで特定の一つでの情報もってくる
        $userposts = Post::with('user')->where('user_id', $id)->latest()->get();

        return view('users.userProfile', compact('user','userprofile', 'userposts'));
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
