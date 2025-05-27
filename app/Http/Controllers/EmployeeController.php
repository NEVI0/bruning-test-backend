<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function findAll()
    {
        try {
            $employees = DB::table('employees')->get();

            return response()->json([
                'employees' => $employees,
                'count' => $employees->count(),
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|string',
                'name' => 'required|string',
                'nickname' => 'required|string',
                'father' => 'required|string',
                'mother' => 'required|string',
                'document' => 'required|string',
                'birthdate' => 'required|string',
                'jobDate' => 'required|string',
            ]);

            $employee = DB::table('employees')->where('id', $validated['id'])->first();
            if ($employee) {
                return response()->json([
                    'message' => 'Colaborador já existe!'
                ], 400);
            }
                        
            DB::table('employees')->insert([
                'id' => $validated['id'],
                'name' => $validated['name'],
                'nickname' => $validated['nickname'],
                'father' => $validated['father'],
                'mother' => $validated['mother'],
                'document' => $validated['document'],
                'birthdate' => $validated['birthdate'],
                'jobDate' => $validated['jobDate'],
            ]);
            
            return response()->json([
                'message' => 'Colaborador criado com sucesso!',
            ], 201);
        } catch (\Exception $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, String $id)
    {
        try {
            if (!$id) {
                return response()->json([
                    'message' => 'ID do colaborador não informado!'
                ], 400);
            }
    
            $employee = DB::table('employees')->where('id', $id)->first();
            if (!$employee) {
                return response()->json([
                    'message' => 'Colaborador não encontrado!'
                ], 404);
            }
    
            $validated = $request->validate([
                'name' => 'required|string',
                'nickname' => 'required|string',
                'father' => 'required|string',
                'mother' => 'required|string',
                'document' => 'required|string',
                'birthdate' => 'required|string',
                'jobDate' => 'required|string',
            ]);
    
            DB::table('employees')->where('id', $id)->limit(1)->update([
                'name' => $validated['name'],
                'nickname' => $validated['nickname'],
                'father' => $validated['father'],
                'mother' => $validated['mother'],
                'document' => $validated['document'],
                'birthdate' => $validated['birthdate'],
                'jobDate' => $validated['jobDate'],
            ]);
    
            return response()->json([
                'message' => 'Colaborador atualizado com sucesso!'
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }

    public function delete(String $id)
    {
        try {
            if (!$id) {
                return response()->json([
                    'message' => 'ID do colaborador não informado!'
                ], 400);
            }

            $employee = DB::table('employees')->where('id', $id)->first();
            if (!$employee) {
                return response()->json([
                    'message' => 'Colaborador não encontrado!'
                ], 404);
            }

            DB::table('employees')->where('id', $id)->limit(1)->delete();

            return response()->json([
                'message' => 'Colaborador deletado com sucesso!'
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }
}
