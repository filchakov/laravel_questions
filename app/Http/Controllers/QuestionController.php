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
        return response()->json(Question::all());
    }

    public function show($id)
    {
        return response()->json(Question::find($id));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255|min:5',
            'text' => 'required|min:10',
            'user_name' => 'required|max:255|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $params = $request->all();
        $user = User::firstOrCreate(['name'=> $params['user_name']]);

        $params['user_id'] = $user->id;

        return response()->json(Question::create($params)->with('user')->first());
    }
}
