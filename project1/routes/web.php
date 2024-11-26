<?php

use App\Http\Controllers\AttendeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("first-route",function(){
    return "Hello, I am the first route";
});
Route::get("route4",function(){
    return response()->json(['first-name'=>"charbel",'last-name'=>"khadra"]);
});
Route::get('route7/{id}', function($id){
    return "this is the value of the parameter:" .$id;
});
Route::get('route-eleven',[BasicController::class,"nameFunc"]);
Route::get('route-twelve',[BasicController::class,"JsonFunc"]);
Route::get('route-13/{id}',[BasicController::class,"parFunc"]);
Route::get('add-student', [StudentController::class, 'insertStudent']);
Route::get('allStudents', [StudentController::class, 'allStudents']);
Route::get('StudentById', [StudentController::class, 'StudentById']);
Route::get('CreditsGt100', [StudentController::class, 'CreditsGt100']);
Route::get('CreditsGt50ORis_reg', [StudentController::class, 'CreditsGt50ORis_reg']);
Route::get('MaxCred', [StudentController::class, 'MaxCred']);
Route::get('MinCred', [StudentController::class, 'MinCred']);
Route::get('AvgCred', [StudentController::class, 'AvgCred']);
Route::get('StudentIn', [StudentController::class, 'StudentIn']);
Route::apiResource('employee',EmployeeController::class);
Route::get('listEmp', [EmployeeController::class, 'listEmp']);
Route::get('Signup',[AttendeController::class,'Signup'])->name('Signup');
Route::post('register',[AttendeController::class,'register'])->name('register');
Route::post('register2',[AttendeController::class,'register2'])->name('register2');
Route::get('display',[AttendeController::class,'display'])->name('display');
Route::get('edit/{id}',[AttendeController::class,'edit'])->name('edit');
Route::put('update/{id}',[AttendeController::class,'update'])->name('update');
Route::delete('delete/{id}',[AttendeController::class,'delete'])->name('delete');
Route::get('search',[AttendeController::class,'search'])->name('search');
Route::resource('movies', MovieController::class)->middleware([Authenticate::class,AdminMiddleware::class]);
Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


