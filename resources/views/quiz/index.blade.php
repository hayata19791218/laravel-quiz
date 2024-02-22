<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <meta name=”robots” content=”noindex”/>
        <title>3択クイズ</title>
    </head>
    <body>
        <div class="container ml-auto mr-auto pt-6 pb-6">
            <h2 class="has-text-centered has-text-weight-bold is-size-4">3択クイズアプリへようこそ</h2>
            <img class="first-view mt-6 is-block ml-auto mr-auto" src="{{ asset('images/first-view.png') }}" alt="">
            <p class="has-text-centered explain">このアプリは雑学アプリです。全問正解を目指しましょう。</p>
            <div class="login">
                <p class="has-text-centered has-text-weight-bold mt-6 is-size-4">メニュー</p>
                <img class="menu-img mt-4 is-block ml-auto mr-auto" src="{{ asset('images/menu.png') }}" alt="クイズのメニュー">
                @auth
                <div class="wrap columns mt-3 ml-auto mr-auto">
                    @if($firstQuestionId)
                    <div class="column">
                        <img class="is-block ml-auto mr-auto" src="{{ asset('images/challenge.png') }}" alt="">
                        <a class="is-block mt-2 has-text-centered" href="{{ route('quiz.show',['questionId' => $firstQuestionId]) }}">クイズに答える</a>
                    </div>
                    @endif
                    <div class="column">
                        <img class="is-block ml-auto mr-auto" src="{{ asset('images/logout.png') }}" alt="">
                        <form class="is-block mt-2 has-text-centered" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="logout" type="submit">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                    <div class="column">
                        <img class="is-block ml-auto mr-auto" src="{{ asset('images/edit.png') }}" alt="">
                        <a href="{{route('profile.edit', auth()->user()->id)}}">プロフィールの編集</a>
                    </div>
                    @can('admin')
                    <div class="column">
                        <img class="is-block ml-auto mr-auto" src="{{ asset('images/manager.png') }}" alt="">
                        <a class="is-block mt-2 has-text-centered" href="{{ route('admin.index') }}">管理人用</a>
                    </div>
                    @endcan
                </div>
                    @if($score)
                    <div class="ranking">
                        <h2 class="has-text-centered has-text-weight-bold mt-6 is-size-4">ランキング</h2>
                        <img class="menu-img mt-4 is-block ml-auto mr-auto" src="{{ asset('images/ranking.png') }}" alt="ランキング">
                        <table border="1" class="mr-auto ml-auto mt-3">
                            <tr>
                                <th class="pl-6 pr-6 pt-2 pb-2">ユーザー名</th>
                                <th class="pl-6 pr-6 pt-2 pb-2">正解数</th>
                            </tr>
                            @foreach($tableScores as $tableScore)
                            <tr>
                                <td class="pl-6 pr-6 pt-2 pb-2">{{ $tableScore->user->name }}</td>
                                <td class="pl-6 pr-6 pt-2 pb-2">{{ $tableScore->score }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                @else
                <p class="mt-3 has-text-centered">ログインしてからクイズに答えて下さい。</p>
                <div class="wrap columns mt-5 ml-auto mr-auto">
                    <div class="column">
                        <img class="is-block ml-auto mr-auto" src="{{ asset('images/login.png') }}" alt="">
                        <a class="is-block mt-2 has-text-centered" href="{{ route('login') }}">ログイン</a>
                    </div>
                    <div class="column">
                        <img class="is-block ml-auto mr-auto" src="{{ asset('images/register.png') }}" alt="">
                        <a class="is-block mt-2 has-text-centered" href="{{ route('register') }}">アカウント登録</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>