<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
    <meta name=”robots” content=”noindex”/>
    <title>問題</title>
</head>
<body>
    <div class="container">
        <h2>{{ $question->question }}</h2>
        <div class="question-wrap">
            <form action="{{ route('quiz.answer') }}" method="get">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                @foreach($question->choices as $index => $choice)
                    <div>
                        <label>
                            <input type="radio" name="choice" value="{{ $index }}" required>
                            {{ $choice }}
                        </label>
                    </div>
                @endforeach
                <input type="submit" value="回答する" class="answer">
            </form>
        </div>
    </div>
</body>
</html>