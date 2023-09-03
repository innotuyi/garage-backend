<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CooperativeController extends Controller
{

    public function getCooperatives()
    {
        $response = Cooperative::all();

        return response()->json($response);
    }


    public function createCooperative(Request $request)
    {
        $rules = [
            'cooperativeName' => 'required|string|max:255',
            'cooperativeLocation' => 'required|string|max:255',
            'numberOfMembers' => 'required|integer|min:1',
            'productsOrServicesOffered' => 'required|string|max:255',
        ];
    
        $validator =Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        try {
            $cooperative = Cooperative::create($request->all());
                return response()->json(['message' => 'Cooperative created successfully', 'data' => $cooperative], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while creating the cooperative', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function getSingleCooperative(int $id)
    {
        $cooperative = Cooperative::find($id);
    
        if (!$cooperative) {
            return response()->json(['message' => 'Cooperative not found'], 404);
        }
    
        return response()->json(['data' => $cooperative]);
    }
    

    public function updateCooperative(Request $request, int $id)
    {
        try {
            $cooperative = Cooperative::find($id);

            if (!$cooperative) {
                return response()->json(['message' => 'Cooperative not found'], 404);
            }

            $data = $request()->all();

            $cooperative->update($data);
            return response()->json(['message' => 'Cooperative updated successfully', 'data' => $cooperative], 200);
        } catch (\Exception $e) {

            return response()->json(['message' => 'An error occurred while updating the cooperative', 'error' => $e->getMessage()], 500);
        }
    }

    public function removeCooperative(int $id)
    {
        try {
            $cooperative = Cooperative::find($id);

            if (!$cooperative) {
                return response()->json(['message' => 'Cooperative not found'], 404);
            }
            $cooperative->delete();
            return response()->json(['message' => 'Cooperative deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the cooperative', 'error' => $e->getMessage()], 500);
        }
    }
}
