@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<div class="form-container">
  <!--/topに値を送る-->
  {!! Form::open(['url'=>'/top'])!!}
  {{Form::token()}}
  <div class="form-group"><img src="images/icon1.png">
    {{Form::input('text','newPost',null,['required','class'=>'form-control','placeholder'=>'投稿内容を入力してください'])}}
  </div>
  <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" all="送信"></button>
  {!! Form::close()!!}
</div>
<div>
  @foreach($list as $list)
  <tr>
    <td>{{$list->user_id}}</td>
    <td>{{$list->post}}</td>
    <td>{{$list->create_at}}</td>

  </tr>
  @endforeach
  <div>
    @foreach($list as $list)
    <!--投稿更新-->
    <td><div class="contents">
      <a class="js-modal-open" href="" post="{{ $list->post}}" post_id="{{$list->id}}"><img src="./image/edit.png" alt="編集"></a>
    </div></td>
    <!--投稿削除-->
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="./images/trash.png" alt="消去"></a></td>
  </tr>
   @endforeach
  </div>
</div>
@endsection

<!--モーダルの中身-->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__contents">
    <form action="/post/update" method="post">
      @csrf
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input type="submit" value="更新">
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>
