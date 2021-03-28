<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostDestroyRequest;
use App\Http\Requests\Post\PostIndexRequest;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Resources\Post\PostIndexResource;
use App\Http\Resources\Post\PostShowResource;
use App\Http\Resources\Post\PostStoreResource;
use App\Http\Resources\Post\PostUpdateResource;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
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
        $data = $this->service->all();
        return PostIndexResource::collection($data);
    }

    protected function show($post_id): PostShowResource
    {
        $post = $this->service->find($post_id);
        return new PostShowResource($post);
    }

    protected function store(PostStoreRequest $request): PostStoreResource
    {
        $body = $request->validated();
        return new PostStoreResource($this->service->create($body));
    }

    protected function update(PostUpdateRequest $request, $post_id): PostUpdateResource
    {
        $body = $request->validated();
        return new PostUpdateResource($this->service->update($body, $post_id));
    }

    protected function destroy(PostDestroyRequest $request): JsonResponse
    {
        $body = $request->validated();
        $this->service->delete($body['ids']);

        return response()->json(['state' => 'POSTS_DELETED']);
    }
}
