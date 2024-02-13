<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\JobDatingApplicationController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('entreprises', EntrepriseController::class);
Route::resource('annonces', AnnonceController::class);
Route::resource('skills', SkillController::class);
Route::get('/dashboard', [EntrepriseController::class, 'showDashboard'])->name('dashboard');
Route::get('', [AnnonceController::class, 'showWelcome'])->name('welcome');
Route::get('/archive',[EntrepriseController::class,'archive'])->name('entreprises.archive');
Route::get('/all',[EntrepriseController::class,'all'])->name('entreprises.all');
Route::post('/jobdating/offers/{offer}/apply', [JobDatingApplicationController::class, 'apply'])->name('jobdating.apply');
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','RoleController');
Route::resource('users','UserController');
});