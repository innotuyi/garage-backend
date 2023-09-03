<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InspectionController extends Controller
{
    public function getInsepections()
    {
        
        $response = Inspection::all();

        return response()->json($response);
    }

    public function getSingleInspection(int $id)
    {
        $inspection = Inspection::find($id);
    
        if (!$inspection) {
            return response()->json(['message' => 'Inspection not found'], 404);
        }
    
        return response()->json($inspection);
    }
    

  
    public function updateInspection(Request $request, int $id)
{
    try {
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return response()->json(['message' => 'Inspection not found'], 404);
        }

        $rules = [
            'cooperativeId' => 'required|integer',
            'inspectorId' => 'required|integer',
            'inspectionDate' => 'required|date', 
            'inspectionType' => 'required|string|max:255', 
            'inspectionResults' => 'required|string|max:255', 
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $inspection->update($request->all());
        return response()->json(['message' => 'Inspection updated successfully', 'data' => $inspection], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while updating the inspection', 'error' => $e->getMessage()], 500);
    }
}

   
public function removeInspection(int $id)
{
    try {
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return response()->json(['message' => 'Inspection not found'], 404);
        }

        $inspection->delete();

        return response()->json(['message' => 'Inspection deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while deleting the inspection', 'error' => $e->getMessage()], 500);
    }
}



public function createInspection(Request $request)
{
    try {
        $rules = [
            'cooperativeId' => 'required|integer',
            'inspectorId' => 'required|integer',
            'inspectionDate' => 'required|date', 
            'inspectionType' => 'required|string|max:255', 
            'inspectionResults' => 'required|string|max:255', 
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $inspection = Inspection::create($request->all());
        return response()->json(['message' => 'Inspection created successfully', 'data' => $inspection], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while creating the inspection', 'error' => $e->getMessage()], 500);
    }
}

   
}
