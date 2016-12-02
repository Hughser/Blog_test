<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Message;
use Redirect;
use Auth;

class MessageController extends Controller
{
    public function store(Request $request, $article_id)
    {
        $message = new Message($request->only('content'));
        $message->article_id = $article_id;
        $message->user_id = Auth::user()->id;
        $message->save();

        return Redirect::back();
    }
}
