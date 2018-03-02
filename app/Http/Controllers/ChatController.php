<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat(){
        return view('chat');
    }

    public function send(){

        $user = User::find(Auth::id());
        $message = "welcome rakib, thanks for joining";
        event(new ChatEvent($message,$user));
    }
}
