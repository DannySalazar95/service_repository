<?php


namespace App\Services;


use App\Models\Post;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    protected $repository;

    /**
     * PostService constructor.
     * @param PostRepositoryInterface $repository
     */
    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all():Collection
    {
        return $this->repository->all();
    }

    public function find($post_id):Post
    {
        return $this->repository->find($post_id);
    }

    public function create(array $data):Post
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $field_id, $field_name = 'id'):Post
    {
        $this->repository->update($data, $field_id, $field_name);
        return $this->repository->find($field_id, $field_name);
    }

    public function delete(array $field_ids, $field_name = 'id'):void
    {
        $this->repository->delete($field_ids, $field_name);
    }
}