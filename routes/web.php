<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryOfCamesController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionCategoryController;
use App\Http\Controllers\VoiceCategoryController;
use App\Http\Controllers\TranslationCategoryController;


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
//Route::resource('categoryofgames',CategoryOfCamesController::class);
//Route::resource('games',GameController::class);
//Route::resource('voice-category',VoiceCategoryController::class);
//Route::resource('voice',VoiceController::class);
//
//Route::resource('translation-category',TranslationCategoryController::class);
//Route::resource('translation',TranslationController::class);


//Route::get('/dashboard', function () {
//    return view('dashboard.home',['menu'=>"home"]);
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('question-category/aswerdesk{id}', [QuestionCategoryController::class, 'startquiz'])->name('startquiz');
    Route::post('question-category/submentans{id}', [QuestionCategoryController::class, 'submentans'])->name('submentans');

    Route::resource('categoryofgames', CategoryOfCamesController::class);
    Route::resource('games', GameController::class);
    Route::resource('voice', VoiceController::class);
    Route::resource('translation', TranslationController::class);
//    Route::get('question/aswerdesk{id}', [QuestionController::class,'startquiz'])->name('startquiz');

    Route::resource('question', QuestionController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('question-category', QuestionCategoryController::class);
    Route::resource('voice-category', VoiceCategoryController::class);
    Route::resource('translation-category', TranslationCategoryController::class);

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//    Route::get('/', function () {
//        return view('dashboard.home',['menu'=>"home"]);
//    });
});

require __DIR__ . '/auth.php';
