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
        <title>問題</title>
    </head>
    <body>
        <div class="question-container  ml-auto mr-auto pt-6 pb-6">
            <h2 class="has-text-centered has-text-weight-bold is-size-4">問題</h2>
            <img class="question is-block ml-auto mr-auto mt-4" src="{{ asset('images/question.png') }}" alt="">
            <p class="mt-5">{{ $question->question }}。</p>
            <div class="question-wrap mt-6">
                <form action="{{ route('quiz.answer') }}" method="post">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    @foreach($question->choices as $index => $choice)
                        <div>
                            <label for="choices">
                                <input id="choices" class="is-inline-block mb-3" type="radio" name="choice" value="{{ $index }}" required>
                                {{ $choice }}
                            </label>
                        </div>
                    @endforeach
                    <div class="control mt-5">
                        <button class="button is-link" type="submit">回答する</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>