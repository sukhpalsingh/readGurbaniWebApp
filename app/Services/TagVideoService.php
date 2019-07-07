<?php

namespace App\Services;

use App\Video;
use App\VideoTag;

class TagVideoService
{
    public function tagVideos()
    {
        $videos = Video::where('tagged', false)
            ->orderBy('id')
            ->limit(100)
            ->get();

        foreach ($videos as $video) {
            (new YoutubeService())->tagVideo($video);
        }
    }
}
