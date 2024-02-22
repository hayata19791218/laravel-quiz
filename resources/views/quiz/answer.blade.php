<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <meta name=”robots” content=”noindex” />
        <title>解答</title>
    </head>
    <body>
        <div class="question-container  ml-auto mr-auto pt-6 pb-6">
            <h2 class="has-text-centered has-text-weight-bold is-size-4">回答</h2>
            <img class="question is-block ml-auto mr-auto mt-4" src="{{ asset('images/result.png') }}" alt="">
            <p class="mt-6">問題: 「{{ $question->question }}」の回答です。</p>
            <p class="mt-2">あなたは選択肢{{ $userAnswer + 1 }}を選びました。</p>

            @if ($isCorrect)
                <p class="mt-2 has-text-weight-bold">正解です！</p>
            @else
                <p class="mt-2 has-text-weight-bold">不正解です。正解は{{ $question->choices[$question->correct_choice - 1] }}です。</p>
            @endif

            @if ($nextQuestionId)
                <a href="{{ route('quiz.show', ['questionId' => $nextQuestionId]) }}" class="mt-5  button is-link">次の問題へ。</a>
            @else
                <div class="result">
                    <h2 class="has-text-centered has-text-weight-bold is-size-4">結果</h2>
                    <img class="question is-block ml-auto mr-auto mt-4" src="{{ asset('images/score.png') }}" alt="">
                    <p class="mt-5">クイズが終了しました、お疲れ様です。</p>
                    <p class="mt-2">正解数は<span class="has-text-weight-bold">「{{ $correctNumber }}」</span>です。</p>
                    <a href="/" class="mt-5 button is-link">トップページに戻る</a>
                </div>
            @endif
        </div>
    </body>
</html>