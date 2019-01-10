<?php

namespace App\Console\Commands;

use App\Services\GurbaniNowService;
use Illuminate\Console\Command;

class GetGurbani extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gurbani:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get gurbani data';

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
        $gurbaniNowService = new GurbaniNowService();
        $gurbaniNowService->populateAngData();
    }
}
