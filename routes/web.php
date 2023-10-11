<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ThreadPostController;
use App\Models\Thread;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $totThreads = Thread::where('userid',Auth::id())->count();
    $totPosts = Post::where('userid',Auth::id())->count();
    return view('dashboard', ['totThreads'=>$totThreads, 'totPosts'=>$totPosts ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // A users total Threads & Posts
    //Route::get('/user-threads-posts', [ThreadPostController::class, 'userThreadsPosts']);

    Route::get('/add-a-thread', [ThreadController::class, 'index']);
    Route::post('/store-thread', [ThreadController::class, 'store']);
    Route::get('/view-threads', [ThreadController::class, 'view']);
});


require __DIR__.'/auth.php';
