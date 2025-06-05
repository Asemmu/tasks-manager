<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Filters\TaskFilters;

class TasksController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Auth::user()->tasks();
         $tasks = (new TaskFilters($request))->apply($query)->paginate(1);

        return view('tasks.inedx')->with('tasks', $tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create(array_merge($request->validated(), ['status' => 'new'], ['user_id' => auth()->user()->id]));
        return redirect()->back()->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.edit')->with('task', $task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // ensure policy is used
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
