<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <meta name=”robots” content=”noindex”/>
        <title>3択クイズ</title>
    </head>
    <body>
        <div class="question-container ml-auto mr-auto pt-6 pb-6">
            @if(session('message'))
                <p class="is-block message has-text-centered pt-2 pb-2">{{ session('message') }}</p>
            @endif
            <h2 class="has-text-centered has-text-weight-bold is-size-4">管理画面</h2>
            <h2 class="mt-6 has-text-centered has-text-weight-bold is-size-4">問題一覧</h2>
            <img class="mt-4 is-block ml-auto mr-auto" src="{{ asset('images/questions.png') }}" alt="問題一覧">
            <table border="1" class="mt-6">
                <tr>
                    <th class="has-text-centered pt-4 pb-4">問題文</th>
                    <th class="has-text-centered pt-4 pb-4">選択肢</th>
                    <th class="has-text-centered pt-4 pb-4">正解</th>
                    <th class="has-text-centered pt-4 pb-4">管理</th>
                </tr>
                @foreach($questions as $question)
                <tr>
                    <td class="pl-3 pr-3 pt-4 pb-4 question">{{ $question->question }}</td>
                    <td class="pl-3 pr-3 pt-4 pb-4">
                        @foreach($question->choices as $index => $choice)
                        <p class="choice">選択肢{{ $index + 1 }} : {{ $choice }}</p>
                        @endforeach
                    </td>
                    <td class="pl-3 pr-3 pt-4 pb-4">
                        <p class="choice">{{ $question->correct_choice }}</p>
                    </td>
                    <td class="pl-3 pr-3 pt-4 pb-4 admin">
                        <a href="{{ route('admin.edit', ['id' => $question->id]) }}" class="link">編集</a>
                        <form class="is-inline-block" method="post" action="{{ route('admin.delete', ['question' => $question]) }}">
                            @csrf
                            @method('DELETE')
                            <button id="delete" class="deleteButton button">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <h2 class="mt-6 has-text-centered has-text-weight-bold is-size-4">その他の管理</h2>
            <div class="columns mt-4">
                <a href="{{ route('quiz.create') }}" class="back column  has-text-centered" >
                    <img class="image mx-auto" src="{{ asset('images/create.png') }}" alt="問題を作る">
                    <p class="has-text-centered mt-2">問題を作成する</p>
                </a>
                <a href="/" class="back column" >
                    <img class="image mx-auto" src="{{ asset('images/home.png') }}" alt="トップページ">
                    <p class="has-text-centered mt-2">トップページに戻る</p>
                </a>
            </div>
        </div>
    </body>
</html>