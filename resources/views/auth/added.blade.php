@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="clear-inner">
    <p>{{session('username')}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <div class="clear-text">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    </div>
    <p class="return-btn">
      <a href="/login">ログイン画面へ</a>
    </p>
  </div>
</div>

@endsection
