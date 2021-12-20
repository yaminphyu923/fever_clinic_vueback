<?php

namespace App\Helpers;

class ApiResponse{
    public static function success($message,$data){
        return response()->json([
            "result" => 1,
            "message" => $message,
            "info" => $data,
        ]);
    }

    public static function fail($message,$data){
        return response()->json([
            "result" => 0,
            "message" => $message,
            "info" => $data,
        ]);
    }
}
