<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return response()->json(User::all());
    }

    public function show($name){
        return response()->json(User::where(['name' => $name])->get());
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