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
	
    // \Artisan::call('backup:database');


        $filename = "backup-" . Carbon\Carbon::now()->format('Y-m-d_H-i-s') . ".sql";
        $mysqlpath= "/Library/WebServer/Documents/BackupTest/storage/mysqldump";

        $command = "$mysqlpath --user=" . env('DB_USERNAME') ." --password=".env('DB_PASSWORD')." --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/" . $filename;

        // $returnVar = NULL;
        // $output  = NULL;
        // exec($command, $output, $returnVar);
        shell_exec($command);
    dd("Done");
});