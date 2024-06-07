<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\FileController;


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
/*----Admin Route*/

Route::prefix('admin')->group(function(){
Route::get('/login',[AdminController::class,'Index'])->name('login_from');

Route::post('/login/owner',[AdminController::class,'Login'])->name('admin.login');

Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware('admin');
Route::get('/reportlist',[AdminController::class,'list'])->name('admin.list')->middleware('admin');
Route::get('/delete',[AdminController::class,'remove'])->name('admin.delete')->middleware('admin');

Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('admin');
Route::get('/register',[AdminController::class,'AdminRegister'])->name('admin.register');
Route::get('/register/create',[AdminController::class,'AdminRegisterCreate'])->name('admin.register.create');
Route::get('/pdf/{id}', [AdminController::class, 'createPDF'])->name('pdfview');

});


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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('report')->group(function () {
    Route::get('/image', [ImageUploadController::class, 'edit'])->name('report.viewImage');
    
});

require __DIR__.'/auth.php';

Route::resource('reports', ReportController::class);
Route::get('reports',[ReportController::class,'Index'])->name('reports.index')->middleware('admin');
Route::post('/location', [LocationController::class,'store']);
Route::post('/upload', [ReportController::class, 'upload'])->name('upload');

Route::post('upload', [ImageUploadController::class, 'uploadImage'])->name('image.upload');
Route::get('images/{filename}', [ImageUploadController::class, 'getImage'])->name('image.display');

Route::get('/', [FileController::class, 'index']);
Route::post('/upload', [FileController::class, 'upload'])->name('upload');


