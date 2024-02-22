<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'choices',
        'correct_choice'
    ];

    protected $casts = [
        'choices' => 'array'
    ];

    function quizStore($request){
        $inputs = $request->validate([
            'question' => 'required',
            'choices' => 'required',
            'correct_choice' => 'required'
        ]);

        $this->question = $inputs['question'];
        $this->choices = $inputs['choices'];
        $this->correct_choice = $inputs['correct_choice'];
        $this->save();
    }

    function quizDelete($request){
        $this->delete();
    }
}
