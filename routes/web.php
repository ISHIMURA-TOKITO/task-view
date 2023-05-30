<?php

use App\Http\Controllers\Api\TaskSendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\TopController;
use App\Http\Controllers\Guest\TemplateTaskController;
use App\Http\Controllers\Member\FolderController;
use App\Http\Controllers\Member\TaskController;
use App\Http\Controllers\Member\TopController as MemberTopController;
use App\Models\User;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('guest.')->group(function () {
    Route::resource('top', TopController::class)->only(['index']);
    Route::resource('template_task', TemplateTaskController::class)->only(['show']);
});

Route::middleware(['auth'])->prefix('member')->name('member.')->group(function () {
    Route::resource('top', MemberTopController::class)->only('index');
    Route::resource('folder', FolderController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('task', TaskController::class);
});

Route::middleware(['auth'])->prefix('api')->name('api.')->group(function () {
    Route::apiresource('task_send', TaskSendController::class)->only('show');
});
