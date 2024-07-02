<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
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

Route::get('/callforapi', function () {
    $user = [
        'name' => 'William',
        'role' => 'developer'
    ];

    return response()->json($user);
});


// Index
Route::get('/projects', [ProjectController::class, 'index']);

// Show
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
