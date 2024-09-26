<?php
namespace App\Services;

class OperationService
{
    public function get($modelClass)
    {
        if (class_exists($modelClass)) {
            return $modelClass::query()
                ->where('status',1)
                ->orderbyDesc('id')
                ->get();
        }

        throw new \Exception("Model class {$modelClass} does not exist.");
    }

    public function create($modelClass, $data)
    {
        if (class_exists($modelClass)) {
            return $modelClass::create($data);
        }

        throw new \Exception("Model class {$modelClass} does not exist.");
    }

    public function show($modelClass, $id)
    {
        if (class_exists($modelClass)) {
            return $modelClass::query()
                ->where('status',1)
                ->where('id',$id)
                ->firstOrFail();
        }

        throw new \Exception("Model class {$modelClass} does not exist.");
    }

    public function delete($modelClass, $id)
    {
        if (class_exists($modelClass)) {
            return $modelClass::destroy($id);
        }

        throw new \Exception("Model class {$modelClass} does not exist.");
    }
}
