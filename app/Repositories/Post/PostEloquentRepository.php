<?php


namespace App\Repositories\Post;


use App\Models\Post;

class PostEloquentRepository implements PostInterfaceRepository
{

    public function all()
    {
        return Post::all();
    }
}