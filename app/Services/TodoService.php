<?php

namespace App\Services;

use App\Http\Requests\TodoStoreRequest;
use App\Interfaces\TodoInterface;

class TodoService
{
    public $todoInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(TodoInterface $todoInterface)
    {
        $this->todoInterface = $todoInterface;
    }

    /**
     * Function: getAllTodos
     * Description: The function fetch all Todos from the repository
     */
    public function getAllTodos()
    {
        return $this->todoInterface->getAllTodos();
    }

    /**
     * Function: getAllTodos
     * Description: The function fetch all Todos from the repository
     */
    public function getTodoById($id)
    {
        return $this->todoInterface->getTodoById($id);
    }

    /**
     * Function: getAllTodos
     * Description: The function fetch all Todos from the repository
     */
    public function createTodo($request)
    {
        $todo = $this->mapTodoFormData($request);
        return $this->todoInterface->createTodo($todo);
    }

    /**
     * Function: updateTodo
     * Description: The function update Todos from the repository
     */
    public function updateTodo($request, $id)
    {

        $todo = $this->mapTodoFormData($request);
        return $this->todoInterface->updateTodo($todo, $id);
    }

    /**
     * Function: deleteTodo
     * Description: The function delete Todos from the repository
     */
    public function deleteTodo($id)
    {
        return $this->todoInterface->deleteTodo($id);
    }

    /**
     * Function: mapTodoFormData
     * Description: The function will map todo from data.
     */
    public function mapTodoFormData($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description
        ];
    }
}
