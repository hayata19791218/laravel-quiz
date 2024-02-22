<?php

namespace App\Http\Controllers;
;
use Illuminate\Http\Request;
use App\Models\Question;

class AdminController extends Controller
{
    public function index(){
        $questions = Question::all();

        return view('admin.index', compact('questions'));
    }

    public function edit($id){
        $choiceId = Question::find($id);

        return view('admin.edit', compact('choiceId'));
    }

    public function update(Question $question, Request $request){
        $question->quizStore($request);

        return back()->with('message', 'クイズの編集が完了しました');
    }

    public function delete(Question $question, Request $request){
        $question->quizDelete($request);

        return back()->with('message', '問題の削除をしました');
    }
}
