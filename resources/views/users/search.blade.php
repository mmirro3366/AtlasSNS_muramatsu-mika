@extends('layouts.login')

@section('content')

<div>
  <form action="/search" method="POST">
    @csrf
    <input type="text" name="keyword" placeholder="ユーザー名">
    <input type="image" name="submit" src="images/search.png" width="20" height="20" alt="検索">
  </form>
</div>

<!-- 検索ワード表示-->
@if (!empty($keyword))
<p>検索ワード：{{$keyword}}</p>
@endif


<!-- ユーザー一覧-->
<div class="container-list">
  <table class='table table-hover'>
  @foreach($users as $user)
  <ul>
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
  @endforeach
  </table>
</div>

@endsection
