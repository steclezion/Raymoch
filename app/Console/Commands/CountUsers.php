<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountUsers extends Command
{
    protected $signature = 'users:count';
    protected $description = 'Count the number of users hitting the server';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Assuming you have a 'users' table
        $userCount = DB::table('users')->count();

        $this->info('Number of users hitting the server: ' . $userCount);

        return 0;
    }
}
