<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller( \App\Http\Controllers\Api\LoginController::class )->group( function(){
    Route::post( 'login', 'login' )->name('login');
} );



Route::middleware('auth:sanctum')->group( function() {

    Route::post( 'applicants', [ \App\Http\Controllers\Api\ApplicantsController::class, 'index' ] )->name('applicants');

    Route::get( 'download-cv/{id}', [ \App\Http\Controllers\Api\CvDownloadController::class, 'index' ] )->name('download.cv');

});
