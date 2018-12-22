<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     * 控制台命令名称
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to a Redis Channel';

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
     * 执行控制台命令
     * @return mixed
     */
    public function handle()
    {

    }
}
