<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::has('posts')->with("posts.images")->get()->map(function ($user) {
                 $user->posts = $user->posts->take(5);
                 return $user;
        });
        return view('home',compact('users'));
    }
}
