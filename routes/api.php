<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameCategoryController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\VoiceCategoryController;
use App\Http\Controllers\Api\VoiceController;
use App\Http\Controllers\Api\TranslationCategoryController;
use App\Http\Controllers\Api\TranslationController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\QuestionCategoryController;
use App\Http\Controllers\Api\ContactController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('game-category',GameCategoryController::class);
Route::apiResource('games',GameController::class);
Route::apiResource('voice-category',VoiceCategoryController::class);
Route::apiResource('voice',VoiceController::class);
Route::apiResource('translation-category',TranslationCategoryController::class);
Route::apiResource('translation',TranslationController::class);
Route::apiResource('questioncategory',QuestionCategoryController::class);
Route::apiResource('question',QuestionController::class);
Route::apiResource('contact',ContactController::class);

