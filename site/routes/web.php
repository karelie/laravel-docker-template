<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

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

Route::resource('/', HomeController::class);
Route::get('api/works', [WorkController::class, 'api']);
Route::get('api/user/{user:id}', [UserController::class, 'api']);

Route::resource('work', WorkController::class);
Route::resource('user', UserController::class);

Route::get('like/likers/{model}/{id}', [LikeController::class, 'likesCount']);
Route::get('like/liked/{model}/{likedmodel}/{id}', [LikeController::class, 'liked']);
Route::get('like/toggle/{model}/{id}', [LikeController::class, 'toggle']);


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
 