<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\commentRequest;
use App\Http\Resources\commentResource;
use App\Http\Resources\ResponseResource;
use App\Models\Comment;
use App\Services\OperationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $operationService;

    public function __construct(OperationService $operationService)
    {
        $this->operationService = $operationService;
    }
    public function create(commentRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        $comment = $this->operationService->create(Comment::class, $request->all());
        $comment = new commentResource($comment);
        return ResponseResource::success($comment, 'The operation was successful');
    }    
}
