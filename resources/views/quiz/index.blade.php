<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
    <meta name=”robots” content=”noindex”/>
    <title>3択クイズ</title>
</head>
<body>
    <div class="container">
        <h2>3択クイズ</h2>
        <div class="login">
            @auth
                @if($firstQuestionId)
                <a href="{{ route('quiz.show',['questionId' => $firstQuestionId]) }}" class="quiz">クイズに答える</a>
                @endif
                @can('admin')
                <a href="{{ route('quiz.create') }}" class="quiz">管理人用</a>
                @endcan
            @else
            <p class="notice">ログインしてからクイズに答えて下さい。</p>
            <div>
                <a href="{{ route('login') }}">ログイン</a>
                <a href="{{ route('register') }}">アカウント登録</a>
            </div>
            @endif
        </div>
    </div>
</body>
</html>