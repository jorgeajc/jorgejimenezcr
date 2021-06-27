<?php

namespace App\Http\Controllers\HandlerResponses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HandlerResponsesController extends Controller
{
    public function jsonServerError($data) {
        return response()->json([
            "body" => [
                "message"=> "Server Error",
                "error"=> $data,
            ],
        ], 500);
    }
    public function jsonSuccess($data) {
        return response()->json([
            "body" => [
                "message"=> "Success",
                "data"=> $data,
            ],
        ], 200);
    }
    public function jsonValidationError($data) {
        return response()->json([
            "body" => [
                "message"=> "Error",
                "error"=> $data,
            ],
        ], 422);
    }
    public function jsonUnauthorized($data) {
        return response()->json([
            "body" => [
                "message"=> "Unauthorized",
                "error"=> $data,
            ],
        ], 401);
    }
    public function jsonNotFound($msg) {
        return response()->json([
            "body" => [
                "message"=> "Not Found",
                "error"=> $msg,
            ],
        ], 422);
    }

}
