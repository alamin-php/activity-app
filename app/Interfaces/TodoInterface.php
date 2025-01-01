<?php

namespace App\Interfaces;

interface TodoInterface
{
    # Fetch all Todos
    public function getAllTodos();

    # Fetch a specific Todo by ID
    public function getTodoById($id);
    # Fetch a specific Todo by ID
    public function getTodoByUser(int $userId);

    # Create a new Todo
    public function createTodo($request);

    # Update a Todo by ID
    public function updateTodo($request, $id);

    # Delete a Todo by ID
    public function deleteTodo($id);
}
