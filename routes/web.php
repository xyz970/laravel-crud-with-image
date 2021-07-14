<?php

use App\Http\Controllers\StudentsController;
use Buki\AutoRoute\AutoRouteFacade as AutoRouter;
use Illuminate\Support\Facades\Route;

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

AutoRouter::auto('/','StudentsController',[
    'name'=>'students'
]);

AutoRouter::auto('/temp','ImageTempController',[
    'name'=>'temp'
]);


