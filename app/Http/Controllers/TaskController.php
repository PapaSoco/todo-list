<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks){
        $this->tasks = $tasks;
    }

    public function index(Request $request){
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request) {
        $request -> validate([
            'name' => 'required|max:255',
        ]);
        
        $request->user()->GetTasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task) {
        Gate::authorize('destroy', $task);
 
        $task->delete();
     
        return redirect('/tasks');
    }
}
