@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<div class="form-container">
  <!--/topに値を送る-->
  {!! Form::open(['url'=>'/createpost'])!!}
  {{Form::token()}}
  <div class="form-group"><img src="images/icon1.png">
    {{Form::input('text','newPost',null,['class'=>'form-control','placeholder'=>'投稿内容を入力してください'])}}
  </div>
  <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" all="送信"></button>
  {!! Form::close()!!}
  @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="validation">{{$error}}</p>
    @endforeach
  @endif
</div>
<div>
  @foreach($list as $list)
  <table class="table table-hover">
    <tr>
    <td>{{$list->id}}</td>
    <td>{{$list->post}}</td>
    <td>{{$list->created_at}}</td>
    <!--投稿更新-->
    <td><div class="contents">
      <a class="js-modal-open" href="/post/{{$list->id}}/update" post="{{ $list->post}}" post_id="{{$list->id}}"><img class="Update" src="./images/edit.png" alt="編集"></a>
    </div></td>
    <!--投稿削除-->
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')">
    <img src="./images/trash.png" alt="消去前">
    <img src="./images/trash-h.png" alt="消去後">
    </img></a></td>
    </tr>
     @endforeach
  </table>
</div>

<!--モーダルの中身-->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__contents">
    <form action="/post/update" method="post">
      <textarea name="upPost" class="modal_post">{{$list->post}}</textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input type="submit" value="更新"onclick="return confirm('この投稿を更新します。よろしいですか？')">
      {{ csrf_field()}}
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>
@endsection
