@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<!-- ↓/addedから/registerに変更 -->


<div class="register-content">
    {!! Form::open(['url' => '/register']) !!}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="register-inner">
        <h2>新規ユーザー登録</h2>
        <div class="register-name">
        {{ Form::label('user name') }}
        {{ Form::text('username',null,['class' => 'input']) }}
        </div>
        <div class="register-mail">
        {{ Form::label('mail adress') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        </div>
        <div class="register-pass">
        {{ Form::label('password') }}
        {{ Form::password('password',null,['class' => 'input']) }}
        </div>
        <div class="register-comfirm">
        {{ Form::label('password comfirm') }}
        {{ Form::password('password_confirmation',null,['class' => 'input']) }}
        </div>
        <div class="register-btn">
        {{ Form::submit('REGISTER',['class' => 'btn']) }}
        </div>
        <div class="return-login">
        <p><a href="/login">ログイン画面へ戻る</a></p>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<!-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="validation">{{$error}}</p>
    @endforeach
@endif -->

@endsection
