<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;

class QuestionsController extends Controller
{
    public function create()
    {
        return view('questions.create');
    }

    public function store(CreateQuestionRequest $request)
    {
        $question = new Question([
            'user_id' => request()->user()->id,
            'title' => request()->title,
            'body' => request()->body,
        ]);

        if (request()->hasFile('image')) {
            $question->image = request()->file('image')->store('images', 'public');
        }

        $question->save();

        return redirect('/')->with('status', 'Pergunta criada com sucesso');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('/');
    }
}
