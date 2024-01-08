@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<!-- ↓/addedから/registerに変更 -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

<!--@if ($errors->any())
    @foreach ($errors as $error)
        <p class="validation">{{$error}}</p>
    @endforeach
@endif-->

@endsection
