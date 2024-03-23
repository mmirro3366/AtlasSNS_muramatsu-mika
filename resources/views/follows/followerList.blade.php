@extends('layouts.login')

@section('content')

<div class="clm_top follower">
  <h2>フォロワーリスト</h2>
  @foreach($follows as $follow)
  <ul>
    <li>
      <div class="follow_icon"><a href="/users/{{ $follow->id }}/userProfile"><img src="{{asset('storage/'.$follow->images)}}" slt="フォローアイコン"></a>
      </div>
    </li>
  </ul>
  @endforeach
</div>


<div class="clm_bottom post_timeline">
  @foreach($post as $post)

  <div class="post">
    <figure class="post_icon"><a href="/users/{{ $post->user->id }}/userProfile"><img src="/storage/{{ $post->user->images }}" class="user-icon"></a></figure>
    <div class="post_content">
      <div>{{$post->user->username}}</div>
      <div>{{$post->created_at}}</div>
      <div>{{$post->post}}</div>
    </div>
  </div>
  @endforeach
</div>

@endsection
