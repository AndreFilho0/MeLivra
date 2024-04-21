<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\BuscarProfessorController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Http\Helpers\StorageS3;

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

Route::get('/dashboard/teste',function (){
    $s3 = new StorageS3();
    $result = $s3->getUrl("YOVANI ADOLFO VILLANUEVA HERRERA2023_1_v.png");
     return $result;
})
->middleware(['auth','verified'])->name('dashboard.teste');
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
