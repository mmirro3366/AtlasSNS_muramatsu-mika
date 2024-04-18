@extends('layouts.login')

@section('content')

<div class="search-top">
  <form action="/search" method="POST">
    @csrf
    <input type="text" name="keyword" placeholder="ユーザー名">
    <input type="image" name="submit" src="images/search.png" width="30" height="30" alt="検索">
  </form>
  <div class="search-word">
    <!-- 検索ワード表示-->
    @if (!empty($keyword))
    <p>検索ワード：{{$keyword}}</p>
    @endif
  </div>
</div>



<!-- ユーザー一覧-->
<div class="container-list">
  <table class='table table-hover'>
  @foreach($users as $user)
  @if(Auth::id() != $user->id)
  <ul>
  <img src="{{asset('storage/'.$user->images)}}" width="40">
  <li>{{$user -> username}}</li>
  @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', [$user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', [$user->id]) }}" method="POST">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
  @endif
  </ul>
  @endif
  @endforeach
  </table>
</div>

@endsection
