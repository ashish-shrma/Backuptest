<?php

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
// Route::get('/Backup', function()
// {
//     //Artisan::call('backup:database');
// 		$command="php artisan backup:database";
//         $returnVar = NULL;
//         $output  = NULL;
//         exec($command, $output, $returnVar);
 
// });
Route::get('Backup', function () {
	
    \Artisan::call('backup:database');
    dd("Done");
});