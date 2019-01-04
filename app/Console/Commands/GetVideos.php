<?php

namespace App\Console\Commands;

use App\Services\YoutubeService;
use Illuminate\Console\Command;

class GetVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'videos:get {keyword}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get new videos';

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
        $youtubeService = new YoutubeService();
        $youtubeService->populateNewVideos($this->argument('keyword'));
    }
}
