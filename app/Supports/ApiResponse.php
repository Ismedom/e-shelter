<?php

namespace App\Supports;

trait ApiResponse
{

    public function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function error($message = null, $code = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], $code);
    }

    public function unauthorized($message = null)
    {
        return $this->error($message, 401);
    }

    public function forbidden($message = null)
    {
        return $this->error($message, 403);
    }

    public function notFound($message = null)
    {
        return $this->error($message, 404);
    }

    public function internalError($message = null)
    {
        return $this->error($message, 500);
    }

}
    


