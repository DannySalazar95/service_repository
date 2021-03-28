<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Resources\Post\PostIndexResource;
use App\Services\PostService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    protected $service;

    /**
     * PostController constructor.
     * @param PostService $service
     */
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    protected function index(PostIndexRequest $request): AnonymousResourceCollection
    {
        //$body = $request->validated();
        $data = $this->service->all();
        return PostIndexResource::collection($data);
    }

    protected function show()
    {

    }

    protected function store()
    {

    }

    protected function update()
    {

    }

    protected function destroy()
    {

    }
}
