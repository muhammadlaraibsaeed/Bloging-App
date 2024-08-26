<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Traits\HelperTrait;

class PostController extends Controller
{
    use HelperTrait;
    protected $postRepository;
    
    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    
    public function index(){
        return view('post');
    }

    public function store(Request $request){
            $request->merge(['user_id' => auth()->user()->id]);
            $postID = $this->postRepository->create($request->only("title", "user_id"));
            $imageURl =  $this->storeImage($request,$postID->id);
            Image::insert($imageURl);
    }
}
