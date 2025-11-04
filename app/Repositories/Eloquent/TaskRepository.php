<?php

namespace App\Repositories\Eloquent;
use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById(int $id): ?Task
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $data): Task
    {
        $task = $this->findById($id);
        $task->update($data);
        return $task;
    }

    public function create(array $data): Task
    {
        return $this->model->create($data);
    }
}
