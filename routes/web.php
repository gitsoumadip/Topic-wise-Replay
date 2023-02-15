<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FouramController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login',[UserController::class, 'index'])->name('login');
Route::get('/registration', [UserController::class,'createRegistration'])->name('createRegistration');
Route::post('/add-registration', [UserController::class,'storeRegistration'])->name('StoreRegistration');
Route::post('/login', [UserController::class,'loginCheck'])->name('Login');
Route::get('/logout',[UserController::class,'logoutCheck'])->name('logout');

Route::get('/',[FouramController::class,'index']);
Route::post('add-fouram',[FouramController::class,'addFouram'])->name('addForumas');

Route::get('view-topic/{id}',[FouramController::class,'viewTopic'])->name('viewTopic');
Route::post('add-question',[QuestionController::class,'addQuestion'])->name('addQuestion');

Route::get('view-question/{topic_id}',[QuestionController::class,'viewQuestion'])->name('viewQuestion');

Route::post('add-comment',[CommentsController::class,'addComment'])->name('addComment');
