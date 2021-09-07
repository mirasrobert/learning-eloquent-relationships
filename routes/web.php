<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return 'Welcome to Laravel';
});

Route::resource('/courses', \App\Http\Controllers\CourseController::class);

// Students
Route::prefix('courses')->group(function () {
	Route::get('/', [\App\Http\Controllers\CourseController::class, 'index']);

	Route::get('/{course}', [\App\Http\Controllers\CourseController::class, 'getSingleCourse']);

	Route::get('/{id}/subjects', [\App\Http\Controllers\CourseController::class, 'getCourseSubjects']);

	Route::get('/{id}/students', [\App\Http\Controllers\CourseController::class, 'getCourseStudents']);
});


// Students
Route::prefix('students')->group(function () {
	Route::get('/', [\App\Http\Controllers\StudentController::class, 'index']);
	Route::get('/{student}', [\App\Http\Controllers\StudentController::class, 'getSingleStudent']);
	Route::get('/{id}/course', [\App\Http\Controllers\StudentController::class, 'getStudentCourse']);
	Route::get('/{id}/subjects', [\App\Http\Controllers\StudentController::class, 'getStudentSubjects']);
});

// Students
Route::prefix('subjects')->group(function () {
	Route::get('/', [\App\Http\Controllers\SubjectController::class, 'index']);
	Route::get('/{subject}', [\App\Http\Controllers\SubjectController::class, 'getSingleSubject']);
	Route::get('/{id}/course', [\App\Http\Controllers\SubjectController::class, 'getSubjectCourse']);
	Route::get('/{id}/students', [\App\Http\Controllers\SubjectController::class, 'getSubjectStudents']);
});




