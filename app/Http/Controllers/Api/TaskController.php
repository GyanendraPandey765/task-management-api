<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'status'        => ['nullable','in:pending,in-progress,completed'],
            'due_date_from' => ['nullable','date_format:Y-m-d'],
            'due_date_to'   => ['nullable','date_format:Y-m-d'],
            'per_page'      => ['nullable','integer','min:1','max:100'],
        ]);

        $query = $request->user()->tasks()->orderBy('due_date');

        if ($request->filled('status'))        $query->status($request->status);
        if ($request->filled('due_date_from')) $query->dueAfter($request->due_date_from);
        if ($request->filled('due_date_to'))   $query->dueBefore($request->due_date_to);

        return response()->json($query->paginate($request->input('per_page', 15)));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $request->user()->tasks()->create($request->validated());
        Log::info('Task created', ['task_id' => $task->id]);
        return response()->json(['message' => 'Task created.', 'task' => $task], 201);
    }

    public function show(Request $request, Task $task)
    {
        abort_if($task->user_id !== $request->user()->id, 403);
        return response()->json(['task' => $task]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        abort_if($task->user_id !== $request->user()->id, 403);
        $task->update($request->validated());
        return response()->json(['message' => 'Task updated.', 'task' => $task->fresh()]);
    }

    public function destroy(Request $request, Task $task)
    {
        abort_if($task->user_id !== $request->user()->id, 403);
        $task->delete();
        return response()->json(['message' => 'Task deleted.']);
    }
}