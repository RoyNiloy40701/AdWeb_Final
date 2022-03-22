<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function getall(){
        return Course::all();
    }

    public function get(Request $req){
        $course = Course::where('id',$req->id)->first();
        if($course){
            $course->department = $course->department;
            return response()->json($course,200);
        }
        return response()->json(["msg"=>"notfound"],404);
        
    }


    public function addCourse(Request $req)
    {
        $course = new Course();
        $course->name = $req->name;
        $course->dept_id = $req->dept_id;
        $course->save();
        if($course->save()){

            return response()->json(["msg"=>"Added Successfully"],200);
        }
     
    }

    public function updateCourse(Request $req)
    {
        $course = Course::where('id', $req->id)->first();
        if (!$course) return response('Course not found', 404);
        $course->name = $req->name;
        $course->dept_id = $req->dept_id;
        $course->save();
        if($course->save()){

            return response()->json(["msg"=>"Updated Successfully"],200);
        }
     
    }

    public function deleteCourse($id)
    {
        $course = Course::where('id', $id)->first();
        if (!$course) return response("Course not found", 404);
       $course= $course->delete();
        if ($course) return response()->json(["msg"=>"Delete Successfully"],200);
        
        return response("Delete failed", 500);
    }
}
