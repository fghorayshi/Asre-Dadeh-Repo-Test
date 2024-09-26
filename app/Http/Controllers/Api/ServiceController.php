<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\serviceResource;
use App\Models\Service;
use App\Services\OperationService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $operationService;

    public function __construct(OperationService $operationService)
    {
        $this->operationService = $operationService;
    }

    public function index()
    {
        $services = $this->operationService->get(Service::class);
        return ResponseResource::success(serviceResource::collection($services), 'Successful display of information');
    }

    public function show(string $id)
    {
        $service = $this->operationService->show(Service::class, $id);        
        $service = new serviceResource($service);
        return ResponseResource::success($service, 'Successful display of information');
    }
}
