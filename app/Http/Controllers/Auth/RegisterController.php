<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|unique:atlas_sns|email',
            'password' => 'required|alpha_num|min:8|max:20',
            'password_confirmation' => 'required|alpha_num|min:8|max:20|password_confirmed',
            ],
             ['username.required' => 'ユーザーネームは必須項目です。',
             'username.min' => 'パスワードは2文字以上で入力してください。',
             'username.max' => 'パスワードは12文字以内で入力してください。',
             'mail.required' => 'メールアドレスは必須項目です。',
             'mail.email' => 'メールアドレスを正しく入力してください。',
             'mail.min' => 'パスワードは5文字以上で入力してください。',
             'mail.max' => 'パスワードは40文字以下で入力してください。',
             'mail.unique' => 'このメールアドレスは既に使われています。',
             'password.required' => 'パスワードは必須項目です。',
             'password.min' => 'パスワードは8文字以上で入力してください。',
             'password.max' => 'パスワードは20文字以下で入力してください。',
             'password.alpha_num' => 'パスワードは英数字で入力してください。',
             'password.confirmed'=> '確認用パスワードが一致しません。',
             'password_confirmation.required' => '確認用パスワードは必須項目です。',
             'password_confirmation.alpha_num' => '確認用パスワードは英数字で入力してください。',
             'password_confirmation.min' => '確認用パスワードは8文字以上で入力してください。',
             'password_confirmation.max' => '確認用パスワードは20文字以下で入力してください。',
                ],
            );

            $data = $request->input();
            $this->create($data);
            return redirect("/added");

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added');
        }
        return view('auth.register');
    }

    //public function added(){
        //return view('auth.added');
    //}
     public function added(Request $request){
        $username = $request->input('username');
        return view('auth.added', ['username'=>$username]);
    }
}
