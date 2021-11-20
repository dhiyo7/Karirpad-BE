<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StuffModel;

class ApiController extends Controller
{
    // Get All
    public function get_all_stuff(){
        $stuffData = StuffModel::all();
        return response()->json([
            'status' => 'OK',
            'message' => 'Success get data stuff',
            'data' => $stuffData
        ], 200);
    }

    // Post Data
    public function insert_data_stuff(Request $request){
        $insert_data = new StuffModel;
        $insert_data->stuff_name= $request->stuffName;
        $insert_data->price= $request->stuffPrice;
        $insert_data->save();
        return response([
            'status' => 'OK',
            'message' => 'Stuff Success to Save',
            'data' => $insert_data
        ], 200);
    }

    // Update
    public function update_data_stuff(Request $request, $id){
        $check_stuff = StuffModel::firstWhere('stuff_code', $id);
        if ($check_stuff) {
            $data_stuff = StuffModel::find($id);
            $data_stuff->stuff_name = $request->stuffName;
            $data_stuff->price = $request->stuffPrice;
            $data_stuff->save();
            return response([
                'status' => 'OK',
                'message' => 'Stuff Success to Edit',
                'data' => $data_stuff
            ],201);
        } else {
            return response ([
                'status' => 'NOT FOUND',
                'message' => 'Stuff Item Not Found',f
            ], 404);
        }
    }
}
