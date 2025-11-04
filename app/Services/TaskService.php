<?php
namespace App\Services;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
// use Illuminate\Support\Facades\Notification; // Gerekirse

class TaskService
{
    protected $taskRepository;

    // Repository'yi Dependency Injection ile alıyoruz.
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function completeTask(int $taskId): Task
    {
        $task = $this->taskRepository->findById($taskId);

        // İŞ MANTIĞI: Eğer görev zaten tamamlanmışsa bir şey yapma
        if ($task->completed) {
            return $task;
        }

        // İŞ MANTIĞI: Görevi tamamla ve bildirim gönder
        $updatedTask = $this->taskRepository->update($taskId, ['completed' => true]);

        // Notification::send($updatedTask->user, new TaskCompleted($updatedTask));

        return $updatedTask;
    }
}
