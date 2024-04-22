<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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

Route::get('/',  [MainController::class, 'home'])->name('home');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/review', [MainController::class, 'review'])->name('review');

Route::get('/nreview', [MainController::class, 'navigation'])->name('nreview');

Route::post('/review/check', [MainController::class, 'review_check']);

Route::get('/dashboard', [MainController::class, 'home'])->name('dashboard');

Route::post('/reservation', [MainController::class, 'reservation'])->name('reservation');

Route::get('/api', [MainController::class, 'api'])->name('api');



Route::get('/deleteuser/{id}',  [AdminController::class, 'delete_user'])->name('delete_user');
Route::get('/search-users', [AdminController::class, 'searchUsers'])->name('search.users');

Route::get('/menu',  [AdminController::class, 'amenu'])->name('admin_menu');

Route::get('/reviews', [AdminController::class, 'areviews'])->name('admmin_reviews');
Route::delete('/delete_review/{id}', [AdminController::class, 'delete_review'])->name('delete_review');
Route::get('/search_review', [AdminController::class, 'search_review'])->name('search_review');



Route::get('/areservation', [AdminController::class, 'areservation'])->name('admin_reservation');

Route::get('/delete_menu_item/{id}', [AdminController::class, 'delete_menu_item'])->name('delete_menu_item');



Route::get('/users', [AdminController::class, 'ausers'])->name('admin_users');


Route::post('/submit_dish', [AdminController::class, 'submit'])->name('submit_dish');


Route::get('/update_menu_item/{id}', [AdminController::class, 'update_menu_item'])->name('update_menu_item');

Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');


// Route::get('/use/{id}/{name}', function ($id, $name) {
//     return 'ID: '. $id. ' Name: ' .$name;
// });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
