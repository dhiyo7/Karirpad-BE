<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryStuff;

class CategoryStuffController extends Controller
{
    public function get_all_category_stuff(){
        $categories = CategoryStuff::all();

        return response()->json([
            'status' => 200,
            'message' => 'Success get category darta',
            'data' => $categories
        ], 200);
    }

    public function insert_data_category_stuff(Request $request){
        $rules = [
            'category_name' => 'required|unique:stuff_category'
        ];

        $validate = \Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json([
                'status' => 422,
                'message' => 'Category Stuff Failed to Save',
                'errors' => $validate->errors()
            ],422);
        }

        $category = CategoryStuff::create([
            'category_name' => $request->category_name
        ]);


        return response()->json([
            'status' => 200,
                'message' => 'Category Stuff Success to Save',
                'errors' =>$category
        ],200);
    }

    public function update_data_category_stuff(Request $request, $id){
        $category = CategoryStuff::findOrFail($id);

        $rules = [
            'category_name' => 'required|unique:stuff_category'
        ];

        $validate = \Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json([
                'status' => 422,
                'message' => 'Category Stuff Failed to Update',
                'errors' => $validate->errors()
            ],422);
        }

        $category->update([
            'category_name' => $request->category_name
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Category Stuff Success to Update',
            'data' => $category
        ],200);      
    }

    public function delete_data_category_stuff($id){
        $category = CategoryStuff::findOrFail($id);

        $category->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Category Stuff Success to Delete',
            'data' => $category
        ],200);   
    }
}
