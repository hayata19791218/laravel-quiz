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
        <title>不正な操作です</title>
    </head>
    <body>
        <div class="container ml-auto mr-auto pt-6 pb-6">
            <h2 class="has-text-centered has-text-weight-bold is-size-4">不正な操作です</h2>
            <img class="mt-6 is-block ml-auto mr-auto sorry-img" src="{{ asset('images/sorry.png') }}" alt="">
            <p class="has-text-centered explain"><a class="top-back" href="/">トップページ</a>に戻ってクイズをやり直して下さい。</p>
        </div>
    </body>
</html>