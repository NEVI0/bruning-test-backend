<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller
{
    public function findAll()
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }

    public function create(Request $request)
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }

    public function update(Request $request)
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }

    public function delete(Request $request)
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }
    
}
