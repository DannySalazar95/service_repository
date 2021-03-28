<?php


namespace App\Repositories\Post;


use App\Models\Post;

class PostEloquentRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($field_id, $field_name = 'id')
    {
        return $this->model->where($field_name, $field_id)->first();
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}