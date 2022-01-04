<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TaskListController;
//use App\Services\ResponseService;

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

Route::post('register', 'App\Http\Controllers\UserController@store')->name('users.store');
//Route::post('register', ['App\Http\Controllers\UserController@users.store']);
Route::post('login', 'App\Http\Controllers\UserController@login')->name('users.login');

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.verify'], function () {
  Route::apiResources([
    'tasklist'  =>  'TaskListController',
    'tasks'  =>  'TasksController',
  ]);

  Route::post('completedTaskList', 'App\Http\Controllers\TaskListController@completedTaskList')->name('tasklist.completedTaskList');
  Route::put('task/close/{id}', 'App\Http\Controllers\TasksController@closeTask')->name('tasks.closeTask');
  Route::get('list/tasks/{id}', 'App\Http\Controllers\TasksController@tasksByList')->name('tasks.tasksByList');
  Route::post('logout', 'UserController@logout')->name('users.logout');
});