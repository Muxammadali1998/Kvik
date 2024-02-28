<?php

namespace App\Repositories;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskRepository implements Interfaces\TasRepositoryInterface
{

    public function getAll($request)
    {

        $tasks = Task::query();

        $tasks->when($request->status, function ($query) use ($request) {
            return $query->where($request->status);
        });

        $tasks->when($request->date, function (Builder $query) use ($request) {
            $query->whereDate('created_at', '>', $request->date);
        });

        $tasks = $tasks->get();

        return $tasks;
    }

    public function store($request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = (new UploadFile())->handle( $request->image,Task::IMAGE_PATH);
        }

        $task = Task::create($data);

        return $task;
    }

    public function update($request, $task)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = (new UploadFile())->handle( $request->image,Task::IMAGE_PATH);
        }

        $task->update($data);

        return $task;
    }

    public function destroy($task): void
    {
        (new DeleteFile())->handle($task->image, Task::IMAGE_PATH);
        $task->delete();
    }

    public function deleteImage($id)
    {
        $task = Task::find($id);

        if (!$task or is_null($task->image))
            return false;

        (new DeleteFile())->handle($task->image, Task::IMAGE_PATH);
        $task->update(['image' => null]);

        return true;
    }

}
