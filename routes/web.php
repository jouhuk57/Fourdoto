<?php

use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('login-home');;
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Super Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
  
    Route::get('/super-admin/home', [HomeController::class, 'superAdminHome'])->name('super.admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/user', [HomeController::class, 'useManagerHome'])->name('manager.user');
    Route::get('/manager/question', [QuestionController::class, 'index'])->name('manager.question');
    Route::get('manager/question/list', [QuestionController::class, 'getQuestions'])->name('question.list');
    Route::get('/manager/create-question', [QuestionController::class, 'createQuestionShow'])->name('manager.create-question');
    Route::post('/manager/storeQuestion', [QuestionController::class, 'storeQuestion'])->name('manager.storeQuestion');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
