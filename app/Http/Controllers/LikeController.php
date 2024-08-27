<?php

namespace App\Http\Controllers;

use App\Repositories\LikeRepository;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    protected $likeRepository;
    public function __construct(LikeRepository $likeRepository) {
        $this->likeRepository = $likeRepository;
    }

    public function store(Request $request){
        $request->merge(['user_id'=>auth()->user()->id]);
        $this->likeRepository->create($request->all());
        return response()->json(['message'=>"Post Have Been Created"]);
    }
}
