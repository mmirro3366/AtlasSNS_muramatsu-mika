@extends('layouts.login')

@section('content')

<div class="clm_top follower">
  <h2>フォロワーリスト</h2>
  @foreach($follows as $follow)
  <ul>
    <li>
      <div class="follow_icon"><a href="/users/{{ $follow->id }}/userProfile"><img src="{{asset('storage/'.$follow->images)}}" slt="フォローアイコン" width="40"></a>
      </div>
    </li>
  </ul>
  @endforeach
</div>


<div class="clm_bottom post_timeline">
  @foreach($post as $post)

  <div class="post">
    <div class="post_icon"><a href="/users/{{ $post->user->id }}/userProfile"><img src="/storage/{{ $post->user->images }}"></a></div>
    <div class="post_content">
      <div class="post-profile">
        <div class="post-name">{{$post->user->username}}</div>
        <div>{{$post->created_at}}</div>
      </div>
      <div class="post-post">
        <div>{!! nl2br($post->post) !!}</div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
