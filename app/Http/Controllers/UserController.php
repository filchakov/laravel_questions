<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $result = User::all()->load(['questions', 'replies'])->toArray();
        return response()->json(array_reverse($result));
    }

    public function show($name){
        return response()->json(User::where(['name' => $name])->with(['questions', 'replies', 'replies.question'])->get()[0]);
    }

    public function store(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:users,name|max:255|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return response()->json(User::create($request->all()));
    }
}