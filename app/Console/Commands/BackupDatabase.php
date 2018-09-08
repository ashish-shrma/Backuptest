<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon;
use Storage;
use DB;
use Mail;

class BackupDatabase extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filename = "backup-" . Carbon\Carbon::now()->format('Y-m-d_H-i-s') . ".sql";

        $file_path = storage_path('app/public');

        $command = "$file_path/mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/" . $filename;



             // $command = "/usr/local/mysql/bin/mysqldump --user=" . config::get('database.mysql.username') ." --password=" . config::get('database.mysql.password') . " --host=" . config::get('database.mysql.host'). " " . config::get('database.mysql.database'). "  > " . storage_path() . "/" . $filename;

        // $returnVar = NULL;
        // $output = NULL;
        // exec($command, $output, $returnVar);

        shell_exec($command);


  

    }
}
