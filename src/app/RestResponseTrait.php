<?php

namespace App;

trait RestResponseTrait
{
    public function success($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ], $code);
    }
    //

    public function error($message = 'Error', $code = 402, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ], 400);
    }
}
