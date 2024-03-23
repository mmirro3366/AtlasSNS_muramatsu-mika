@extends('layouts.login')

@section('content')

<!--<div class="container">
  <div class="update">
    {!! Form::open(['url' =>'/profileupdate']) !!}
    @csrf
    {{Form::hidden('id',Auth::user()->id)}}
    <img class="update-icon" src="{{ asset('images/' .auth()->user()->images) }}">
    <div class="update-form">
      <div class="update-block">
        <label for="name">user name</label>
        <input type="text" name="username" value="{{Auth::user()->username}}">
      </div>
      <div class="update-block">
        <label for="mail">mail address</label>
        <input type="email" name="mail" value="{{Auth::user()->mail}}">
      </div>
      <div class="update-block">
        <label for="pass">password</label>
        <input type="password" name="password" value="">
      </div>
      <div class="update-block">
        <label for="pass">password comfirm</label>
        <input type="password" name="password_comfirmation" value="">
      </div>
      <div class="update-block">
        <label for="name">bio</label>
        <input type="text" name="bio" value="{{Auth::user()->bio}}">
      </div>
      <div class="update-block">
        <label for="name">icon image</label>
        <input type="file" name="images">
      </div>
      <input type="submit" class="btn btn-danger">
      {{Form::token()}}
      {!! Form::close() !!}
    </div>
  </div>
</div>-->
<form action="{{ url('profileupdate') }}" enctype="multipart/form-data" method="post">{{--profileupdateのpostに飛ぶ--}}
  @csrf
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
   @endif
  <dl class="UserProfile">
    <dt>username</dt>
    <dd><input type="text" name="username" value="{{ Auth::user()->username }}"></dd>
    <dt>mail address</dt>
    <dd><input type="text" name="mail" value="{{ Auth::user()->mail }}"></dd>
    <dt>password</dt>
    <dd><input type="password" name="password"></dd>
    <dt>password confirm</dt>
    <dd><input type="password" name="password_confirmation"></dd>
    <dt>bio</dt>
    <dd><input type="text" name="bio" value="{{ Auth::user()->bio }}"></dd>
    <dt>icon image</dt>
    <dd><input type="file" name="images"></dd>
  </dl>
  <input type="submit" name="profileupdate" value="更新" >
</form>

@endsection
