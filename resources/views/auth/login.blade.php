@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<!-- ↓/topから/loginに変更 -->
<div class="login-content">
  {!! Form::open(['url' => '/login']) !!}
  <div class="login-inner">
    <p>AtlasSNSへようこそ</p>

    <div class="login-mail">
    {{ Form::label('mail adress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="login-pass">
    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
    </div>
    <div class="login-btn">
      {{ Form::submit('LOGIN',['class' => 'btn']) }}
    </div>
    <div class="register">
      <p><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
  </div>

  {!! Form::close() !!}
</div>
@endsection
