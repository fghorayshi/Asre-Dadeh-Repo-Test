<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Http\Resources\BlogCategoryResource;
use App\Http\Requests\BlogCategoryRequest;
use App\Http\Resources\ResponseResource;
use App\Services\OperationService;

class BlogCategoryController extends Controller
{
    protected $operationService;

    public function __construct(OperationService $operationService)
    {
        $this->operationService = $operationService;
    }
    public function index()
    {
        $blogCategories = $this->operationService->get(BlogCategory::class);
        return ResponseResource::success(BlogCategoryResource::collection($blogCategories), 'Successful display of information');
    }

    public function create(BlogCategoryRequest $request)
    {
        $blogCategory = $this->operationService->create(BlogCategory::class, $request->all());
        $blogCategory = new BlogCategoryResource($blogCategory);
        return ResponseResource::success($blogCategory, 'The operation was successful');
    }
}
