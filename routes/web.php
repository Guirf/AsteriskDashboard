<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;
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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// }

Route::get('/', [ActionsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/addRamal', [ActionsController::class, 'addRamal'])->name('addRamal');
Route::post('/novoRamal', [ActionsController::class, 'addRamalNew']);

Route::get('/fila/login', [ActionsController::class, 'logIn'])->name('/fila/login');

Route::get('/add/user', [ActionsController::class, 'addUser']);

Route::get('/teste', [ActionsController::class, 'teste']);

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return  "all cleared ...";

});

require __DIR__.'/auth.php';
