<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    //
    public function getall(){
        return Department::all();
    }

    public function get(Request $req){
        $dept = Department::where('id',$req->id)->first();
        if($dept){
            return response()->json($dept,200);
        }
        return response()->json(["msg"=>"notfound"],404);
        
    }

    public function addDepartment(Request $req)
    {
        $dept = new Department();
        $dept->name = $req->name;
    
        $dept->save();
        if($dept->save()){

            return response()->json(["msg"=>"Added Successfully"],200);
        }
     
    }

    public function updateDepartment(Request $req)
    {
        $dept = Department::where('id', $req->id)->first();
        if (!$dept) return response(' not found', 404);
        $dept->name = $req->name;
     
        $dept->save();
        if($dept->save()){

            return response()->json(["msg"=>"Updated Successfully"],200);
        }
     
    }
    public function deleteDepartment($id)
    {
        $dept = Department::where('id', $id)->first();
        if (!$dept) return response(" not found", 404);
       $dept= $dept->delete();
        if ($dept) return response()->json(["msg"=>"Delete Successfully"],200);
        
        return response("Delete failed", 500);
    }

   
}
