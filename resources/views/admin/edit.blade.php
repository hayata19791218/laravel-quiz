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
        <title>問題の編集</title>
    </head>
    <body>
        <div class="question-container ml-auto mr-auto pt-6 pb-6">
            @if(session('message'))
                <p class="is-block message has-text-centered pt-2 pb-2">{{ session('message') }}</p>
            @endif
            <h2 class="has-text-centered has-text-weight-bold is-size-4">問題の編集</h2>
            <form class="mt-6" action="{{ route('admin.update', ['question' => $choiceId]) }}" method="post">
                @csrf
                @method('put')
                <div class="mt-3">
                    <label class="label">問題文 : </label>
                    <input type="text" name="question" class="input" value="{{ old('question', $choiceId->question) }}">
                </div>
                <div class="mt-3">
                    <label class="label">選択肢1 : </label>
                    <input type="text" name="choices[0]" class="input" value="{{ old('choices[0]', $choiceId->choices[0]) }}">
                </div>
                <div class="mt-3">
                    <label class="label">選択肢2 : </label>
                    <input type="text" name="choices[1]" class="input" value="{{ old('choices[1]', $choiceId->choices[1]) }}">
                </div>
                <div class="mt-3">
                    <label class="label">選択肢3 : </label>
                    <input type="text" name="choices[2]" class="input" value="{{ old('choices[2]', $choiceId->choices[2]) }}">
                </div>
                <div class="mt-3">
                    <label class="label">正解の選択肢</label>
                    <select name="correct_choice" class="select" value="{{ old('correct_choice', $choiceId->correct_choice) }}">
                        <option value="1">選択肢1</option>
                        <option value="2">選択肢2</option>
                        <option value="3">選択肢3</option>
                    </select>
                </div>
                <input type="submit" value="問題を更新する" class="is-block mt-2" >
            </form>
            <a href="{{ route('admin.index') }}" class="is-block mt-5" >管理画面に戻る</a>
        </div>
    </body>
</html>