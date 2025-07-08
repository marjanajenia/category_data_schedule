<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function export_category(){
        return response()->json(
            Category::where('push_time', '<=' ,now())->get(),
        );
    }
    public function import_category(Request $request){
        foreach($request->all() as $item){
            Category::updateOrCreate([
                ['name' => $item['name']],
                ['push_time' => $item['push_time']]
            ]);
        }
        return response()->json([
            'message' => 'Data Imported'
        ]);
    }
}
