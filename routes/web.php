<?php

use App\Http\Controllers\ProfileController;
use App\Jobs\TestJob;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    dd(debug_backtrace());
    foreach(User::with('articles')->find(1)->articles as $article){
        dump($article->author->id);
    }

    return 'sfds';
    /*dd();
    //dd(\Illuminate\Support\Facades\Cache::store());
   // \Illuminate\Support\Facades\Redis::set('you', 'hello sadaworld');
    TestJob::dispatch();
    \Illuminate\Support\Facades\Cache::put('you', 'hello sadaworld');
    return view('welcome');*/
});

Route::get('/test', function () {
    return \Illuminate\Support\Facades\Cache::get('you');
});

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
