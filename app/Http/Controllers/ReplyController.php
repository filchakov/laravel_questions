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
        $result = Reply::all()->load(['user', 'question'])->toArray();
        return response()->json(array_reverse($result));
    }

    public function show($id)
    {
        return response()->json(Reply::find($id)->load(['user', 'question']));
    }
}
