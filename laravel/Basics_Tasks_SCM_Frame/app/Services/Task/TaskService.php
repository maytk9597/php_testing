<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;

class TaskService implements TaskServiceInterface
{

    private $taskDao;

    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To get task list
     * @return array $userList list of users
     */
    public function getTaskList()
    {
        return $this->taskDao->getTaskList();
    }

    /**
     * To delete task
     * @param string $id of Task
     * @return View Task List
     */
    public function deleteTask($id)
    {
        return $this->taskDao->deleteTask($id);
    }

    /**
     * To add new task
     * @param Request $request request to add new task
     * @return View home
     */
    public function addTask(HttpRequest $request)
    {
        return $this->taskDao->addTask($request);
    }
}
