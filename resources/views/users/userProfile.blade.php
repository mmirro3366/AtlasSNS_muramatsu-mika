@extends('layouts.login')

@section('content')


<div class="users-profile">

  <div class="userprofile-contents">
      <div class="userprofile-icon"><img src="{{asset('images/' . $userprofile->images )}}"></div>
      <div class=user-name>
      <div class="userprofile-name">ユーザー名</div>
      <div class="userprofile-username">{{$userprofile->username}}</div>
      </div>
      <div class=user-bio>
      <div class="userprofile-bio">自己紹介</div>
      <div class="userprofile-comment">{{$userprofile->bio}}</div>
      </div>
  </div>

  <div class="follow-unfollow">
    @if (auth()->user()->isFollowing($userprofile->id))
    <form action="{{ route('unfollow', [$userprofile->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', [$userprofile->id]) }}" method="POST">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
    @endif
    </div>

</div>


@foreach($userposts as $post)
<div class="post">
    <div class="post_img">
    @if($user->images == 'Atlas.png')
        <img src="{{asset('images/' . $userprofile->images )}}" alt="ユーザーアイコン" width="50" height="50">
    @else
        <img src="{{asset('images/' . $userprofile->images )}}" alt="ユーザーアイコン" width="40">
    @endif
    </div>
    <div class="post_content">
        <div class="post-profile">
            <div class="post_username">{{$userprofile->username }}</div>
            <div>{{ $post->updated_at }}</div>
        </div>
        <br>
        <div class="post_post">
            <div>{{ $post->post }}</div>
        </div>
    </div>
</div>
@endforeach

@endsection
