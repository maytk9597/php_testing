<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for task
 */
interface TaskDaoInterface
{
    /**
     * To get task list
     * @return array $taskList list of tasks
     */
    public function getTaskList();

    /**
     * To delete task
     * @param string $id of Task
     * @return View Task List
     */
    public function deleteTask($id);

    /**
     * To add new task
     * @param Request $request request to add new task
     * @return View home
     */
    public function addTask(Request $request);
}
