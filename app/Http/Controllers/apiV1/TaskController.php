<?php

namespace App\Http\Controllers\apiV1;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        if(!is_null($request->image))
        {
         $data['image'] = (new UploadFile())->handle(Task::PATH,$request->image);
        }
        return new TaskResource(Task::create($data));
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        if(!is_null($request->image))
        {
            
            (new DeleteFile())->handle( $task->image,Task::PATH);
            $data['image'] = (new UploadFile())->handle(Task::PATH,$request->image);
        }
        $task->update($data);

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json();
    }
}
