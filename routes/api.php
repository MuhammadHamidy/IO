<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageNewsController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\PagePartnersController;
use App\Http\Controllers\Api\PageTeamsController;
use App\Http\Controllers\Api\PageTestimonialsController;
use App\Http\Controllers\Api\ProgramsController;
use App\Http\Controllers\Api\UserController;

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login')->middleware(['web']);
Route::post('/login-inbound', [UserController::class, 'loginInbound'])->name('login-inbound')->middleware(['web']);
Route::post('/login-outbound', [UserController::class, 'loginOutbound'])->name('login-outbound')->middleware(['web']);


Route::get('/events', [EventsController::class, 'index']);
Route::post('/events', [EventsController::class, 'store']);
Route::put('/events/{id}', [EventsController::class, 'update']);
Route::delete('/events/{id}', [EventsController::class, 'destroy']);
Route::get('/events/{id}', [EventsController::class, 'show']);

Route::get('/partners', [PagePartnersController::class, 'index']);
Route::get('/partners/{id}', [PagePartnersController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/partners', [PagePartnersController::class, 'store']);
    Route::put('/partners/{id}', [PagePartnersController::class, 'update']);
    Route::delete('/partners/{id}', [PagePartnersController::class, 'destroy']);
});

Route::get('/teams', [PageTeamsController::class, 'index']);
Route::get('/teams/{id}', [PageTeamsController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/teams', [PageTeamsController::class, 'store']);
    Route::put('/teams/{id}', [PageTeamsController::class, 'update']);
    Route::delete('/teams/{id}', [PageTeamsController::class, 'destroy']);
});

Route::get('/testimonials', [PageTestimonialsController::class, 'index']);
Route::get('/testimonials/{id}', [PageTestimonialsController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/testimonials', [PageTestimonialsController::class, 'store']);
    Route::put('/testimonials/{id}', [PageTestimonialsController::class, 'update']);
    Route::delete('/testimonials/{id}', [PageTestimonialsController::class, 'destroy']);
});

Route::get('/check-documents', [UserController::class, 'checkDocuments'])->middleware('auth:sanctum');





