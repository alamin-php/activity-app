<?php

namespace App\Trait;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public static function success($status, $data = [], $message = "", $code = 200): JsonResponse
    {
        // Prepare the response array with the status
        $response = ['status' => $status];

        // Add 'message' and 'data' only if they are not empty
        $response = array_filter([
            'status' => $status,
            'message' => $message ?: null,  // Add 'message' if not empty
            'data' => $data ?: null,        // Add 'data' if not empty
        ]);

        // Return the JSON response with the provided status code
        return response()->json($response, $code);
    }




}
