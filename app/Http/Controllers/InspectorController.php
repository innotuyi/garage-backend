<?php

namespace App\Http\Controllers;

use App\Models\Inspector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InspectorController extends Controller
{

    public function getInsepectors()
    {
        try {
            $inspectors = Inspector::all();

            return response()->json(['data' => $inspectors], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving inspectors', 'error' => $e->getMessage()], 500);
        }
    }



    public function getSingleInspector(int $id)
    {
        try {
            $inspector = Inspector::find($id);

            if (!$inspector) {
                return response()->json(['message' => 'Inspector not found'], 404);
            }
            return response()->json(['data' => $inspector], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the inspector', 'error' => $e->getMessage()], 500);
        }
    }




    public function updateInspector(Request $request, $id)
    {
        try {
            $inspector = Inspector::find($id);

            if (!$inspector) {
                return response()->json(['message' => 'Inspector not found'], 404);
            }

            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:inspectors,email,' . $inspector->id, // Allow email to remain the same for the current inspector
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            $inspector->update($request->all());

            return response()->json(['message' => 'Inspector updated successfully', 'data' => $inspector], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the inspector', 'error' => $e->getMessage()], 500);
        }
    }


    public function removeInspector(int $id)
    {
        try {
            $inspector = Inspector::find($id);

            if (!$inspector) {
                return response()->json(['message' => 'Inspector not found'], 404);
            }

            $inspector->delete();

            return response()->json(['message' => 'Inspector deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the inspector', 'error' => $e->getMessage()], 500);
        }
    }


    public function createInspector(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:inspectors,email', // Assuming email should be unique among inspectors
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            $inspector = Inspector::create($request->all());

            return response()->json(['message' => 'Inspector created successfully', 'data' => $inspector], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while creating the inspector', 'error' => $e->getMessage()], 500);
        }
    }
}
