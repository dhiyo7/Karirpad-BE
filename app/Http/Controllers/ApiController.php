<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StuffModel;

class ApiController extends Controller
{
    // Get All
    public function get_all_stuff(){
        $stuffData = StuffModel::with("category")->get();
        $results = [];

        foreach($stuffData as $stuff){
            $results[] = [
                "stuff_code"=> $stuff->stuff_code,
                "stuff_name"=> $stuff->stuff_name,
                "price"=> $stuff->price,
                'category_id' => $stuff->category_id,
                'category_name' => $stuff->category->category_name,
                "created_at"=> $stuff->created_at,
                "updated_at"=> $stuff->updated_at,
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => 'Success get data stuff',
            'data' => $results
        ], 200);
    }

    // Post Data
    public function insert_data_stuff(Request $request){

        $rules = [
            'stuff_name' => 'required',
            'stuff_price' => 'required',
            'category_id' => 'required'
        ];

        $validate = \Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json([
                'status' => 422,
                'message' => 'Stuff Failed to Save',
                'errors' => $validate->errors()
            ], 422);
        }

        $duplicates = StuffModel::where('stuff_name', $request->stuff_name)
        ->where('price', $request->stuff_price)
        ->where('category_id', $request->category_id)->get();

        if(count($duplicates) > 0){
            return response()->json([
                'status' => 400,
                'message' => 'Data is duplicated',
            ],400);
        }

        $stuff = StuffModel::create([
            'stuff_name' => $request->stuff_name,
            'price' => $request->stuff_price,
            'category_id' => $request->category_id
        ]);

        return response([
            'status' => 200,
            'message' => 'Stuff Success to Save',
            'data' => $stuff
        ], 200);
    }

    // Update
    public function update_data_stuff(Request $request, $id){
        $stuff = StuffModel::findOrFail($id);

        $rules = [
            'stuff_name' => 'required',
            'stuff_price' => 'required',
            'category_id' => 'required'
        ];

        $validate = \Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json([
                'status' => 422,
                'message' => 'Stuff Failed to Save',
                'errors' => $validate->errors()
            ], 422);
        }

        $duplicates = StuffModel::where('stuff_name', $request->stuff_name)
        ->where('price', $request->stuff_price)
        ->where('category_id', $request->category_id)->get();

        if(count($duplicates) > 0){
            return response()->json([
                'status' => 400,
                'message' => 'Data is duplicated',
            ],400);
        }

        $stuff->update([
            'stuff_name' => $request->stuff_name,
            'price' => $request->stuff_price,
            'category_id' => $request->category_id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Stuff Success to Update',
            'data' => $stuff
        ],200);
    }

    public function delete_data_stuff($id){
        $stuff = StuffModel::findOrFail($id);

        $stuff->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Stuff Success to Delete',
            'data' => $stuff
        ],200);
    }
}
