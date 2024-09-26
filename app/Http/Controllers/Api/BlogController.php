<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\ResponseResource;
use App\Models\BlogCategory;
use App\Models\User;
use App\Services\OperationService;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $operationService;

    public function __construct(OperationService $operationService)
    {
        $this->operationService = $operationService;
    }

    public function index()
    {
        $blogs = $this->operationService->get(Blog::class);
        return ResponseResource::success(BlogResource::collection($blogs), 'Successful display of information');
    }

    public function create()
    {
        $blogCategories = $this->operationService->get(BlogCategory::class);
        return ResponseResource::success(BlogCategoryResource::collection($blogCategories), 'Successful display of information');
    }

    public function store(BlogRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        $blog = $this->operationService->create(Blog::class, $request->all());
        $blog = new BlogResource($blog);
        return ResponseResource::success($blog, 'The operation was successful');
    }

    public function show(string $id)
    {
        $blog = $this->operationService->show(Blog::class, $id);        
        $blog = new BlogResource($blog);
        return ResponseResource::success($blog, 'Successful display of information');
    }

    public function destroy(string $id)
    {
        $this->operationService->delete(Blog::class, $id);
        return ResponseResource::success('Data deleted successfully');
    }
}
