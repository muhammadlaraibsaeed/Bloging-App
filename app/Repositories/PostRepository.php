<?php

namespace App\Repositories;
use App\Contracts\RepositoryInterface;
use App\Models\Post;

class PostRepository implements RepositoryInterface
{
    protected $post;

    public function __construct(Post $post) {
        $this->post=  $post;
    }

    public function all(){

    }

    public function find($id){

    }

    public function create(array $data){
          return $this->post::create($data);
    }

    public function update($id, array $data){

    }

    public function delete($id){
        
    }
}
