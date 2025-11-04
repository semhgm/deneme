<?php

namespace App\Repositories\Interfaces;
use App\Models\Task;
use Illuminate\Support\Collection;

    interface TaskRepositoryInterface
    {
        public function all(): Collection;
        public function findById(int $id): ?Task;
        public function update(int $id, array $data): Task;
        public function create(array $data): Task;
    }
