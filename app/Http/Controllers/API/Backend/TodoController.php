<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Services\TodoService;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    use ApiResponse;

    public $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Todos from the TodoService
        $todos = $this->todoService->getAllTodos();

        if (!$todos->isEmpty()) {
            // return new TodoCollection($todos);
            $data = TodoResource::collection($todos);
            return ApiResponse::success(status: 'success', data: $data);
        } else {
            return ApiResponse::success(status: 'error', message: 'No todos found', code: 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoStoreRequest $request)
    {
        $todo = $this->todoService->createTodo($request);
        if ($todo) {
            return ApiResponse::success(status: 'success', message: "Todo has been created", code: 201);
        } else {
            return ApiResponse::success(status: 'error', data: "Unable to create Todo");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = $this->todoService->getTodoById($id);
        if ($todo) {
            $data = new TodoResource($todo);
            return ApiResponse::success(status: 'success', data: $data);
        } else {
            return ApiResponse::success(status: 'error', message: 'Todo not found', code: 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoUpdateRequest $request, string $id)
    {
        $todo = $this->todoService->updateTodo($request, $id);
        if ($todo) {
            return ApiResponse::success(status: 'success', message: "Todo has been updated", code: 201);
        } else {
            return ApiResponse::success(status: 'error', data: "Unable to update Todo");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = $this->todoService->deleteTodo($id);
        if ($todo) {
            return ApiResponse::success(status: 'success', message:"Todo deleted successfully.");
        } else {
            return ApiResponse::success(status: 'error', message: 'Unable to delete Todo', code: 404);
        }
    }
}
