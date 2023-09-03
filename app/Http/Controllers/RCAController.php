<?php

namespace App\Http\Controllers;

use App\Models\Rca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RCAController extends Controller
{
    public function getRcas()
    {
        try {
            $rcas = RCA::all();
    
            return response()->json(['data' => $rcas], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving RCA records', 'error' => $e->getMessage()], 500);
        }
    }
    

    public function getSingleRca(int $id)
    {
        try {
            $rca = RCA::find($id);
    
            if (!$rca) {
                return response()->json(['message' => 'RCA record not found'], 404);
            }
    
            return response()->json(['data' => $rca], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the RCA record', 'error' => $e->getMessage()], 500);
        }
    }
    

    public function updateRca(Request $request)
    {
        try {
            $rules = [
                'id' => 'required|integer', // ID of the RCA record to be updated
                'rootCauseDescription' => 'required|string|max:255',
                'impact' => 'required|string|max:255',
                'correctiveAction' => 'required|string|max:255',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
    
            $rca = RCA::find($request->input('id'));
    
            if (!$rca) {
                return response()->json(['message' => 'RCA record not found'], 404);
            }
    
            $rca->update([
                'rootCauseDescription' => $request->input('rootCauseDescription'),
                'impact' => $request->input('impact'),
                'correctiveAction' => $request->input('correctiveAction'),
            ]);
    
            return response()->json(['message' => 'RCA record updated successfully', 'data' => $rca], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the RCA record', 'error' => $e->getMessage()], 500);
        }
    }
    

public function removeRca(int $id)
    {
        try {
            $rca = RCA::find($id);
    
            if (!$rca) {
                return response()->json(['message' => 'RCA record not found'], 404);
            }
    
            $rca->delete();
    
            return response()->json(['message' => 'RCA record deleted successfully'], 200);
        }  catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the RCA record', 'error' => $e->getMessage()], 500);
        }
    }
   
    
    public function createRca(Request $request)
    {
        try {
            // Define validation rules for the request data
            $rules = [
                'inspectionID' => 'required|integer', // Assuming this is the ID of the related inspection
                'rootCauseDescription' => 'required|string|max:255',
                'impact' => 'required|string|max:255',
                'correctiveAction' => 'required|string|max:255',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
    
            $rca = Rca::create($request->all());
    
            return response()->json(['message' => 'RCA created successfully', 'data' => $rca], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while creating the RCA', 'error' => $e->getMessage()], 500);
        }
    }
    

  
}
