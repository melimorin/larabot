<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Message;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();
        return view('home', ['messages'=>$messages, 'user'=>Auth::user()->name]);
    }



}
