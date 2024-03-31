@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<div class="form-container">
  <!--/topに値を送る-->
  {!! Form::open(['url'=>'/createpost'])!!}
  {{Form::token()}}
  <div class="form-group"><img src="/storage/{{ Auth::user()->images }}">
    {{Form::input('text','newPost',null,['class'=>'form-control','placeholder'=>'投稿内容を入力してください'])}}
  </div>
  <button type="submit" class="btn-send pull-right"><img src="images/post.png" all="送信"></button>
  {!! Form::close()!!}
  @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="validation">{{$error}}</p>
    @endforeach
  @endif
</div>
<div class="post-parents">
  <ul>
     @foreach($list as $list)
     @if(Auth::user()->isFollowing($list->user->id) || Auth::id()==$list->user_id)
    <li class="post-block">
      <a href="/users/{{ $list->user->id }}/userProfile"><img src="{{ asset('images/'.$list->user->images) }} "></a>
       <!--<td>{{$list->id}}</td>-->
      <div class="post-profile">
        <div class="post-name">{{$list->user->username}}</div>
        <div>{{$list->created_at}}</div>
      </div>
      <div class="post-post">
        <div>{{$list->post}}</div>
      </div>
      <!--投稿更新-->
      @if( Auth::id() == ($list->user_id))
      <div class="post-update">
        <div class="js-modal-open" href="/post/{{$list->id}}/update" post="{{$list->post}}" post_id="{{$list->id}}"><img class="Update" src="./images/edit.png" alt="編集" width="40"></img></div>
      </div>
      <!--投稿削除-->
      <div class="post-delete">
        <a href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')">
          <img src="./images/trash.png" alt="消去前" width="40"></img><img src="./images/trash-h.png" alt="消去後" width="40"></img>
        </a>
      </div>
      @endif
    </li>
    @endif
    @endforeach
  </ul>
</div>

<!--モーダルの中身-->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__contents">
    <form action="/post/{{$list->id}}/update" method="post">
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input type="image" value="更新" onclick="return confirm('この投稿を更新します。よろしいですか？')" src="./images/edit.png" width="40" ></input>
      {{ csrf_field()}}
    </form>
    <a class="js-modal-close" href="" >閉じる</a>
  </div>
</div>
@endsection
