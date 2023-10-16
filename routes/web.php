<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Thread;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\IsAdmin;
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

// Route::get('/dashboard', function () {

//     $totThreads = Thread::where('userid',Auth::id())->count();
//     $totPosts = Post::where('userid',Auth::id())->count();
//     return view('dashboard', ['totThreads'=>$totThreads, 'totPosts'=>$totPosts ]);
// })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/add-a-thread', [ThreadController::class, 'index']);
    Route::post('/store-thread', [ThreadController::class, 'store']);
    Route::get('/user-threads', [ThreadController::class, 'userthreads']);

    Route::get('/latest-threads', [ThreadController::class, 'latestthreads']);
    Route::get('/view-thread', [ThreadController::class, 'view']);
    
    Route::post('/store-post', [PostController::class, 'store']); 
});

// // Route to Lock Threads
// Route::middleware('auth')->group(function() {
//     Route::get('/lock-threads', [ThreadController::class, 'lockthreads'])->middleware(CheckAdmin::class);
    
// });

// If Admin, you can lock threads and delete users
Route::prefix('admin')->middleware(['auth','isadmin'])->group(function() {
    Route::get('/lock-threads', [ThreadController::class, 'lockthreads']);
    Route::post('/lock-thread-store/{thread}', [ThreadController::class, 'lockthreadstore'])->name('lockthreadstore');

    Route::get('/delete-user', [UserController::class, 'delete']);
});


require __DIR__.'/auth.php';
