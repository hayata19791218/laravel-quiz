<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Gate;

class QuizController extends Controller
{
    public function index()
    {
        $firstQuestionId = Question::where('id', '>=' ,1)->first();

        return view('quiz.index',compact('firstQuestionId'));
    }

    public function show($questionId)
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

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'question' => 'required',
            'choices' => 'required',
            'correct_choice' => 'required'
        ]);

        $question = new Question();
        $question->question = $inputs['question'];
        $question->choices = $inputs['choices'];
        $question->correct_choice = $inputs['correct_choice'];
        $question->save();

        return back();
    }

    public function answer(Request $request)
    {
        $userAnswer = $request->input('choice');
        $questionId = $request->input('question_id');
        $question = Question::findOrFail($questionId);
        $correctChoiceIndex = $question->correct_choice - 1;

        if ($userAnswer == $correctChoiceIndex) {
            $isCorrect = true;
        } else {
            $isCorrect = false;
        }

        $nextQuestionId = Question::where('id', '>', $questionId)->first();

        return view('quiz.answer', compact('isCorrect', 'question', 'userAnswer', 'nextQuestionId'));
    }
}
