<?php

namespace App\Http\Controllers\apiV1;

use App\Helpers\Traits\ApiResponcer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskCreateRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponcer;

    public function __construct(public TaskRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $tasks = $this->repository->getAll($request);
        $tasks = TaskResource::collection($tasks);

        return $this->success($tasks);
    }

    public function store(TaskCreateRequest $request)
    {
       $task = $this->repository->store($request);
       $task = new TaskResource($task);
        return $this->success($task, 'Task created');
    }

    public function show(Task $task)
    {
        $task = new TaskResource($task);
        return $this->success($task);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
       $task = $this->repository->update($request,$task);
       $task = new TaskResource($task);
        return $this->success($task, 'Task Updated');
    }

    public function destroy(Task $task)
    {
        $this->repository->destroy($task);
        return $this->success(null, 'Task deleted');
    }

    public function deleteImage($id){

        if(!$this->repository->deleteImage($id))
            return $this->error('Image not found' , 404);

        return $this->success(null,'Image deleted');
    }
}
