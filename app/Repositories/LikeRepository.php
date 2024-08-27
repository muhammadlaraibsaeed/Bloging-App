<?php

namespace App\Repositories;
use App\Models\like;
use App\Contracts\RepositoryInterface;

class LikeRepository implements RepositoryInterface
{
    protected $like;

    public function __construct(like $like) {
        $this->like=  $like;
    }

    public function all(){

    }

    public function find($id){

    }

    public function create(array $data){
          return $this->like::create($data);
    }

    public function update($id, array $data){

    }

    public function delete($id){
        
    }
}
