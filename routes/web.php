<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
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

    $activeusers = User::activeusers();
    $totThreads = Thread::where('userid',Auth::id())->count();
    $totPosts = Post::where('userid',Auth::id())->count();
    return view('dashboard', ['totThreads'=>$totThreads, 'totPosts'=>$totPosts, 'activeusers'=>$activeusers ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/add-a-thread', [ThreadController::class, 'index'])->name('add-a-thread');
    Route::get('/user-threads', [ThreadController::class, 'userthreads'])->name('user-threads');

    Route::post('/store-thread', [ThreadController::class, 'store']);
    Route::post('/like-thread/{id}', [ThreadController::class, 'likethread'])->name('likethread');

    Route::get('/latest-threads', [ThreadController::class, 'latestthreads'])->name('latest-threads');
    Route::get('/view-thread/{id}', [ThreadController::class, 'view']);
    
    Route::post('/store-post', [PostController::class, 'store']); 
    Route::post('/like-post/{pid}/{tid}', [PostController::class, 'likepost'])->name('likepost');
});

// If Admin, you can lock threads and delete users
Route::prefix('admin')->middleware(['auth','isadmin'])->group(function() {
    Route::get('/lock-threads', [ThreadController::class, 'lockthreads'])->name('lock-threads');
    Route::post('/lock-thread-store/{thread}', [ThreadController::class, 'lockthreadstore'])->name('lockthreadstore');

    Route::get('/user-list', [UserController::class, 'view'])->name('user-list');
    Route::post('/user-delete', [UserController::class, 'delete'])->name('userdelete');

});


require __DIR__.'/auth.php';
