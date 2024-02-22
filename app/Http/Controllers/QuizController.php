<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index()
    {
        $firstQuestionId = Question::where('id', '>=' ,1)->first();

        $score = Score::count();

        $tableScores = Score::with('user')->orderBy('score', 'DESC')->take(5)->get();

        return view('quiz.index',compact('firstQuestionId', 'score', 'tableScores'));
    }

    public function show($questionId, Request $request)
    {
        $question = Question::findOrFail($questionId);

        return view('quiz.show',compact('question'));
    }

    public function create()
    {
        if(!Gate::allows('admin')){
            abort(403);
        }else{
            return view('quiz.create');
        }
    }

    public function store(Question $question, Request $request)
    {
        $question->quizStore($request);

        return back()->with('message', '問題を作成しました');
    }

    public function answer(Request $request)
    {
        $userAnswer = $request->input('choice');
        $questionId = $request->input('question_id');
        $question = Question::findOrFail($questionId);
        $correctChoiceIndex = $question->correct_choice - 1;
        $questions = Question::count();
        Session::increment('flagNumber');

        if ($userAnswer == $correctChoiceIndex) {
            $isCorrect = true;

            Session::increment('key');
        } else {
            $isCorrect = false;
        }

        $nextQuestionId = Question::where('id', '>', $questionId)->first();

        $flag = Session::get('flagNumber', 0);

        $correctNumber = Session::get('key',0);

        $userId = auth()->id();

        if($flag == $questions){
            $scoreRecord = new Score([
                'user_id' => $userId,
                'score' => $correctNumber
            ]);

            $scoreRecord->save();

            Session::forget('key');
            Session::forget('flagNumber');
        }

        $request->session()->regenerateToken();

        return view('quiz.answer', compact('isCorrect', 'question', 'userAnswer', 'nextQuestionId' ,'correctNumber'));
    }
}
