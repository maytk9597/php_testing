<?php

namespace App\Contracts\Dao\Task;


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
     * @return Object $delete delete object
     */
    public function deleteTask($id);

    /**
     * To add new task * @param array $validated Validated values from request
     * @return Object $task task object
     */
    public function addTask($validated);
}
