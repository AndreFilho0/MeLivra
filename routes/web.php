<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\BuscarProfessorController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Http\Helpers\StorageS3;
use App\Models\User;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard',[
     'nomeUser'=>Auth()->user()->name,
     'emailUser'=>Auth()->user()->email,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/doacao', function () {
    return Inertia::render('Doacao',[
     'nomeUser'=>Auth()->user()->name,
     'emailUser'=>Auth()->user()->email,
    ]);
})->middleware(['auth', 'verified'])->name('doacao');
Route::get('/home', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('home');

//buscar Professor
Route::get('/dashboard/buscarprofessor',[BuscarProfessorController::class,'showFormBuscarProfessor'])->middleware(['auth','verified'])->name('dashboard.buscarprofessor');

//compartilhar endpoints
Route::get('/dashboard/deixarComentario',[ComentariosController::class,'showFormComentario'])
->middleware(['auth','verified'])->name('dashboard.deixarComentario');

Route::get('/dashboard/darnota',[ComentariosController::class,'showFormDarNota'])
->middleware(['auth','verified'])->name('dashboard.darnota');

Route::post('/dashboard/addComentario',[ComentariosController::class,'AddComentario'])
->middleware(['auth','verified'])->name('dashboard.addComentario');
Route::post('/dashboard/addNota',[ComentariosController::class,'AddNota'])
->middleware(['auth','verified'])->name('dashboard.addNota');
Route::get('/dashboard/procuraInfo',[BuscarProfessorController::class,'BucarInformacaoProfessor'])
->middleware(['auth','verified'])->name('dashboard.procuraInfo');

//END

//Rota de assinatura
Route::get('/subscribe',[SubscribeController::class,'subscribeUser'])
->middleware(['auth','verified'])->name('subscribe');

//END



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
