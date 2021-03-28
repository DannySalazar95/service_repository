<?php


namespace App\Services;


use App\Repositories\Post\PostRepositoryInterface;

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

    public function all()
    {
        return $this->repository->all();
    }

    public function find($post_id)
    {
        return $this->repository->find($post_id);
    }
}