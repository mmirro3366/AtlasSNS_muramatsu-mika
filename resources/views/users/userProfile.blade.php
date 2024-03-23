@extends('layouts.login')

@section('content')


<div class="users-profile">

  <div class="userprofile-contents">
      <div class="userprofile-icon"><img src="{{asset('images/' . $userprofile->images )}}"></div>
      <div class=user-name>
      <div class="userprofile-name">name</div>
      <div class="userprofile-username">{{$userprofile->username}}</div>
      </div>
      <div class=user-bio>
      <div class="userprofile-bio">bio</div>
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
        <img src="{{asset('images/' . $userprofile->images )}}" alt="ユーザーアイコン" width="50" height="50">
    @endif
    </div>
    <div class="post_content">
        <div class="post_top">
            <p class="post_username">{{ $userprofile->username }}</p><br>
            <p class="post_updated_at">{{ $post->updated_at }}</p><br>
        </div>
        <p class="post_post">{{ $post->post }}</p><br>
    </div>
</div>
@endforeach

@endsection
