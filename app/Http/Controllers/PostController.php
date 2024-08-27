<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $postRepository;
    
    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    
    public function index(){
        return view('post');
    }

    public function store(Request $request){
            $request->merge([
                'user_id' => auth()->user()->id,
                'request' => $request,
            ]);
            $postID = $this->postRepository->create($request->only("title", "user_id","request"));
            return response()->json(['message'=>"Post SuccessFully Created"]);

    }

    public function getListPost()
    {
        $users = $this->postRepository->getListPost();
        return view('postsListing',compact('users'));
    }
}
