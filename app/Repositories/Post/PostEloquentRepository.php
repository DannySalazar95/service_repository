<?php


namespace App\Repositories\Post;


use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class PostEloquentRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function all():Collection
    {
        return $this->model->all();
    }

    public function find($field_id, $field_name = 'id'):Post
    {
        return $this->model->where($field_name, $field_id)->first();
    }

    public function create(array $data):Post
    {
        return $this->model->create($data);
    }

    public function update(array $data, $field_id, $field_name = 'id'):int
    {
        return $this->model->where($field_name, $field_id)->update($data);
    }

    public function delete($field_ids, $field_name = 'id'):void
    {
        $this->model->whereIn($field_name, $field_ids)->delete();
    }
}