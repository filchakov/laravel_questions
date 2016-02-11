<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use App\Reply;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserReplyController extends Controller
{
    public function index(Request $request, $name){

        return response()->json(User::where(['name' => $name])->get()->load(['replies']));
    }

    public function store(Request $request, $name, $question_id)
    {
        $params = array_merge($request->all(), ['name' => $name, 'question_id' => $question_id]);

        $validator = \Validator::make($params, [
            'text' => 'required|min:10',
            'name' => 'required|max:255|min:2',
            'question_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if(Question::where(['id' => $question_id, 'is_delete' => 0])->count()){
            $new_user = User::firstOrCreate(['name'=> $params['name']]);
            $params['user_id'] = $new_user->id;
            $result = Reply::create($params);

        } else {
            $result = ['question_id' => ['The specified ID of the question does not exist']];
            return response()->json($result, 400);
        }

        return response()->json($result);
    }
}
