<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
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
     * @param Request $request request to add new task
     * @return View home
     */
    public function addTask(Request $request)
    {
        $add = $this->taskInterface->addTask($request);
        return redirect('/');
    }
}
