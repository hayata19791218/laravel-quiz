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
        <title>プロフィールの編集</title>
    </head>
    <body>
        <div class="container ml-auto mr-auto pt-6 pb-6">
            @if(session('message'))
                <p class="is-block message has-text-centered pt-2 pb-2">{{ session('message') }}</p>
            @endif
            <h2 class="has-text-centered has-text-weight-bold is-size-4">プロフィールの編集</h2>
            <form action="{{route('profile.update', $user)}}" class="mt-6">
                @csrf
                @method('put')
                <div class="control mb-3">
                    <label for="name">名前</label>
                    <input type="text" name="name" class="input is-info mt-2" id="name" value="{{old('name', $user->name)}}">
                </div>
                <div class="control mb-3">
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" class="input is-info mt-2" id="email" value="{{old('email', $user->email)}}">
                </div>
                <div class="control mb-3">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="input is-info mt-2" id="password" value="{{old('password', $user->password)}}">
                </div>
                <div class="control mb-3">
                    <label for="password">パスワード再入力</label>
                    <input id="password-confirm" type="password" class="input is-info mt-2" name="password_confirmation" placeholder="パスワードを再入力してください" required autocomplete="new-password">
                </div>
                <div class="control">
                    <button class="button is-link">送信</button>
                </div>
            </form>
            <div class="control mt-4">
                <a href="/">トップページに戻る</a>
            </div>
        </div>
    </body>
</html>