<?php

namespace App\Repositories\Interfaces;

interface TasRepositoryInterface{
    public function getAll($request);

    public function store($request);
    public function update($request, $task);
    public function destroy($task);
    public function deleteImage($id);
}
