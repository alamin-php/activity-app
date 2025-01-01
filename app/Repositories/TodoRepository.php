<?php

namespace App\Repositories;

use App\Interfaces\TodoInterface;
use App\Models\Todo;

class TodoRepository implements TodoInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    /**
     * Function: getAllTodos
     * Description: The function fetch all the Todo form Model
     */
    public function getAllTodos()
    {
        // return Todo::paginate(5);
        return Todo::latest()->get();
    }
    /**
     * Function: getTodoById
     * Description: The function fetch specific the Todo form Model
     */
    public function getTodoById($id)
    {
        return Todo::find($id);
    }
    /**
     * Function: getTodoById
     * Description: The function fetch specific the Todo form Model
     */
    public function getTodoByUser(int $userId)
    {
        return Todo::where('id', $userId)->get();
    }
    /**
     * Function: createTodo
     * Description: The function create a new Todo
     */
    public function createTodo($data)
    {
        return Todo::create($data);
    }
    /**
     * Function: updateTodo
     * Description: The function update a existing Todo
     */
    public function updateTodo($todoRequest, $id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->update($todoRequest);
            return $todo;
        }

        return false;
    }
    /**
     * Function: deleteTodo
     * Description: The function delete a existing Todo
     */
    public function deleteTodo($id)
    {
        return Todo::destroy($id);
    }
}
