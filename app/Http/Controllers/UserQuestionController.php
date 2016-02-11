<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserQuestionController extends Controller
{
    public function index(Request $request, $name){

        $result = User::where(['name' => $name])->get()->load(['questions'])->toArray();
        return response()->json(array_reverse($result));
    }

    public function store(Request $request, $name)
    {
        $params = array_merge($request->all(), ['name' => $name]);

        $validator = \Validator::make($params, [
            'title' => 'required|max:255|min:5',
            'text' => 'required|min:10',
            'name' => 'required|max:255|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $new_user = User::firstOrCreate(['name'=> $params['name']]);

        $params['user_id'] = $new_user->id;
        $new_question = Question::create($params)->toArray();//->user()->save($new_user);
        $new_question['user'] = $new_user;

        return response()->json($new_question);
    }
}
