<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskDao implements TaskDaoInterface
{

    /**
     * To get task list
     * @return array $taskList list of tasks
     */
    public function getTaskList()
    {
        $taskList = Task::orderBy('created_at', 'asc')->get();

        return $taskList;
    }

    /**
     * To delete task
     * @param string $id of Task
     * @return View Task List
     */
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/');
    }

    /**
     * To add new task
     * validate before add
     * @param Request $request request to add new task
     * @return View home
     */
    public function addTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }
}
