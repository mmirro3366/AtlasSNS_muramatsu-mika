@extends('layouts.login')

@section('content')

<div class="clm_top follow">
  <h2>フォローリスト</h2>
  @foreach($follows as $follow)
  <ul>
    <li>
      <div class="follow_icon"><img src="{{asset('storage/'.$follow->images)}}" slt="フォローアイコン">
      </div>
    </li>
  </ul>
  @endforeach
</div>
<div class="clm_bottom post_timeline">
  @foreach($post as $post)

  <li class="post">
    <figure class="post_icon"></figure>
    <div class="post_content">
      <div>{{$post->users->username}}</div>
      <div>{{$post->created_at}}</div>
      <div>{{$post->post}}</div>
    </div>
  </li>
  @endforeach
</div>
@endsection
