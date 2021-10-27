<?php

namespace App\Contracts\Services\Task;

interface TaskServiceInterface
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
     * @param array $validated Validated values from request
     * @return View home
     */
    public function addTask($validated);
}
