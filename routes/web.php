<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//buscar Professor
Route::get('/dashboard/buscarprofessor',function(){
    return Inertia::render('BuscarProfessor');
})->middleware(['auth','verified'])->name('dashboard.buscarprofessor');

//deixar comentario
Route::get('/dashboard/deixarComentario',function(){
    return Inertia::render('DeixarComentario');
})->middleware(['auth','verified'])->name('dashboard.deixarComentario');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//adm rotas
Route::group(['prefix'=>'admin','middleware'=>'redirectAdmin'],function(){
   Route::get('login',[AdmController::class,'showLoginForm'])->name('admin.login');
   Route::post('login',[AdmController::class,'login'])->name('admin.login.post');
   Route::post('logout',[AdmController::class,'logout'])->name('admin.logout');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function (){
    Route::get('/dashboard',[AdmController::class,'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
