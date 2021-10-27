<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskValidateRequest;
use Illuminate\Http\Request;

/**
 * This is Task Controller.
 * This will handle task CRUD processing.
 */
class TaskController extends Controller
{
    /**
     * task interface
     */
    private $taskInterface;
    /**
     * Create a new controller instance.
     * @param TaskServiceInterface $taskServiceInterface
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * To show task list
     *
     * @return View Task list
     */
    public function showTaskList()
    {
        $tasks = $this->taskInterface->getTaskList();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * To delete task
     * @param string $id of Task
     * @return View Task List
     */
    public function deleteTask($id)
    {

        $delete = $this->taskInterface->deleteTask($id);
        return redirect('/');
    }

    /**
     * To add new task
     * validate $request with TaskValidateRequest
     * @param Request $request request to add new task
     * @return View home
     */
    public function addTask(TaskValidateRequest $request)
    {
        $validated = $request->validated();
        $add = $this->taskInterface->addTask($validated);
        return redirect('/');
    }
}
