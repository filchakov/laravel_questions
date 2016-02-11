<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
{

    public function index()
    {
        $result = Question::all()->load('replies');
        return response()->json($result);
    }

    public function show($id)
    {
        $question = Question::find($id);
        if(!is_null($question)){
            $result = $question->load(['user', 'replies']);
        } else {
            return response()->json(['question_id'=>['question_id' => 'Invalida ID question']], 400);
        }
        return response()->json($result);
    }
}
