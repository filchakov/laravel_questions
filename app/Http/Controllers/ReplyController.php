<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReplyController extends Controller
{
    public function index()
    {
        return response()->json(Reply::all()->load(['user', 'question']));
    }

    public function show($id)
    {
        return response()->json(Reply::find($id)->load(['user', 'question']));
    }
}
