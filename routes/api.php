<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//course
Route::post('/course/add', [CourseController::class, 'addCourse']);
Route::get('/course/all',[CourseController::class,'getall']);
Route::get('/course/get/{id}',[CourseController::class,'get']);
Route::put('/course/update/{id}',[CourseController::class,'updateCourse']);
Route::post('/course/delete/{id}', [CourseController::class, 'deleteCourse']);



//department
Route::get('/department/all',[DepartmentController::class,'getall']);
Route::get('/department/get/{id}',[DepartmentController::class,'get']);
Route::post('/department/add', [DepartmentController::class, 'addDepartment']);
Route::put('/department/update/{id}',[DepartmentController::class,'updateDepartment']);
Route::post('/department/delete/{id}', [DepartmentController::class, 'deleteDepartment']);



