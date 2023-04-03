<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingShowController;
use App\Http\Controllers\ScrapingExecuteController;
use Illuminate\Http\RedirectResponse;
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
    return view('welcome');
});

Route::get('scraping', [ScrapingShowController::class, 'show']);

Route::get('/validation/execute', [ScrapingExecuteController::class, 'execute']);

Route::post('/validation', [ScrapingExecuteController::class, 'scrapingVal']);


