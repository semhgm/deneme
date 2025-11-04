<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Temel bir sorgu başlatıyoruz.
        $tasksQuery = Task::query();

        // EĞER URL'de ?status=completed parametresi varsa...
        $tasksQuery->when($request->query('status') === 'completed', function ($query) {
            // ...sadece completed=true olanları getir.
            return $query->where('completed', true);
        });

        // EĞER URL'de ?status=pending parametresi varsa...
        $tasksQuery->when($request->query('status') === 'pending', function ($query) {
            // ...sadece completed=false olanları getir.
            return $query->where('completed', false);
        });

        // Oluşturulan sorguyu çalıştır ve sonuçları al.
        $tasks = $tasksQuery->get();

        // Sonuçları JSON formatında döndür.
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Validasyon ve Yetkilendirme -> UpdateTaskRequest halletti.
        // İş Mantığı ve Veri Erişimi -> TaskService halletti.

        $updatedTask = $this->taskService->completeTask($task->id);

        // Controller'ın tek görevi: İsteği al, ilgili servise yönlendir, cevabı döndür.
        return response()->json($updatedTask);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
