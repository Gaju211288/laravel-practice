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




use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\empController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (Auth::check()) {
            return view('student.index');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



Route::get('students' , [empController::class , 'index']);
Route::get('fetch-students', [empController::class, 'fetchstudent']);
Route::post('students' , [empController::class , 'store']);
Route::get('edit-student/{id}', [empController::class, 'edit']);
Route::put('update-student/{id}', [empController::class, 'update']);
Route::delete('delete-student/{id}', [empController::class, 'destroy']);
Route::post('search-student', [empController::class, 'searchStudent']);
Route::get('/export-csv', [empController::class,'export'])->name('export-csv');
