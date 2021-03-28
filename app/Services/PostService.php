<?php


namespace App\Services;


use App\Repositories\Post\PostInterfaceRepository;

class PostService
{
    protected $repository;

    /**
     * PostService constructor.
     * @param PostInterfaceRepository $repository
     */
    public function __construct(PostInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }
}