<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;

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
     * @return Object $delete delete object
     */
    public function deleteTask($id)
    {
        $delete = Task::findOrFail($id)->delete();

        return $delete;
    }

    /**
     * To add new task
     * @param array $validated Validated values from request
     * @return Object $task task object
     */
    public function addTask($validated)
    {

        $task = new Task;
        $task->name = $validated['name'];
        $task->save();

        return $task;
    }
}
