<?php

use App\Http\Controllers\CivilController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LRController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\WorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("signup", [LRController::class, "signup"]);
Route::post("signin", [LRController::class, "signin"]);

Route::get("faculty/index", [FacultyController::class, "getData"]);
Route::get("faculty/by/{id}", [FacultyController::class, "getDataById"]);
Route::get("faculty/accept/{id}", [FacultyController::class, "accept"]);
Route::get("faculty/refuse/{id}", [FacultyController::class, "refuse"]);
Route::post("faculty/update/{id}", [FacultyController::class, "update"]);
Route::post("faculty/profile", [FacultyController::class, "profile"]);


Route::get("education/index/{id?}", [EducationController::class, "getAll"]);
Route::get("education/delete/{id}", [EducationController::class, "delete"]);
Route::post("education/create", [EducationController::class, "create"]);
Route::post("education/update/{id}", [EducationController::class, "edit"]);

Route::get("work/index/{id?}", [WorkController::class, "getAll"]);
Route::get("work/delete/{id}", [WorkController::class, "delete"]);
Route::post("work/create", [WorkController::class, "create"]);
Route::post("work/update/{id}", [WorkController::class, "edit"]);

Route::get("civil/index/{id?}", [CivilController::class, "getAll"]);
Route::get("civil/delete/{id}", [CivilController::class, "delete"]);
Route::post("civil/create", [CivilController::class, "create"]);
Route::post("civil/update/{id}", [CivilController::class, "edit"]);


Route::get("program/index/{id?}", [ProgramController::class, "getAll"]);
Route::get("program/delete/{id}", [ProgramController::class, "delete"]);
Route::post("program/create", [ProgramController::class, "create"]);
Route::post("program/update/{id}", [ProgramController::class, "edit"]);
