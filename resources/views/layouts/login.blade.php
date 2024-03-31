<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

    <!--Jquery-->
    <script src="http://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{asset('/js/script.js')}}"></script>
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <div id="user">
                <div id="username">
                    <p>{{Auth::user()->username}}さん<img src="/storage/{{ Auth::user()->images }}"></p>
                <div>
                <div class="accordion-container">
                    <p class="menu-btn">▼</p>
                    <ul class="accordion-content">
                        <li><a href="/top" style="text-decoration:none;">HOME</a></li>
                        <li><a href="/profile" style="text-decoration:none;">プロフィール編集</a></li>
                        <li><a href="/logout" style="text-decoration:none;">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="name">{{Auth::user()->username}}さんの</p>
                <div class="contents">
                <p class="item">フォロー数</p>
                <p class="item">{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="btn-list"><a class="btn btn-primary" href="/followList" role="button">フォローリスト</a></p>
                <div class="contents">
                <p class="item">フォロワー数</p>
                <p class="item">{{ Auth::user()->followUsers()->get()->count() }}名</p>
                </div>
                <p class="btn-list"><a class="btn btn-primary" href="/followerList"  role="button">フォロワーリスト</a></p>
            </div>
            <p class="btn-search"><a class="btn btn-primary" href="/search" role="button">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
