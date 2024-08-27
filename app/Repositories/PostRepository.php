<?php

namespace App\Repositories;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\DB;
use App\Contracts\RepositoryInterface;

class PostRepository implements RepositoryInterface
{
    use HelperTrait;

    protected $post;

    public function __construct(Post $post) {
        $this->post=  $post;
    }

    public function all(){

    }

    public function find($id){

    }

    public function create(array $data){
        
        DB::beginTransaction();
        
        try {

            $request = $data['request'];
            $post = $this->post::create($request->all());
            $imageURl = $this->storeImage($request, $post->id);
            Image::insert($imageURl);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();        
            throw $e;
        }

    }

    public function update($id, array $data){

    }

    public function delete($id){
        
    }

    public function getListPost(){

      $UserPosts =  User::has('posts')->with(['posts.images', 'like'=>function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])->get()->map(function ($user) {
          $user->posts = $user->posts->take(5);
          $user->Like_By_current_User = $user->like;
                return $user;
        });  
        return $UserPosts;

    }
}
