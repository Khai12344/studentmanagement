<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/menu', function () {
    return view('layout');
});

Route::get('/', function () {
    return view('layout');
});

//Students
Route::resource('students', StudentController::class); //all methods in controller

/* Route::get('/', [StudentController::class, 'index'])->name('index');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update'); */

//Students
Route::resource('teachers', TeacherController::class); //all methods in controller

/* Route::get('/', [TeacherController::class, 'index'])->name('index');

Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');

Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update'); */

//Courses
Route::resource('courses', CourseController::class); //all methods in controller

/* Route::get('/', [CourseController::class, 'index'])->name('index');

Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update'); */

//Batches
Route::resource('batches', BatchController::class); //all methods in controller

/* Route::get('/', [BatchController::class, 'index'])->name('index');

Route::get('/batches/{id}/edit', [BatchController::class, 'edit'])->name('batches.edit');

Route::put('/batches/{id}', [BatchController::class, 'update'])->name('batches.update'); */

//Enrollments
Route::resource('enrollments', EnrollmentController::class); //all methods in controller

/* Route::get('/', [EnrollmentController::class, 'index'])->name('index');

Route::get('/enrollments/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');

Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update'); */

//Payments
Route::resource('payments', PaymentController::class); //all methods in controller

/* Route::get('/', [PaymentController::class, 'index'])->name('index');

Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');

Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update'); */

//Route::get('/payments/pdf', 'PaymentController@generatePDF')->name('payments.pdf');













