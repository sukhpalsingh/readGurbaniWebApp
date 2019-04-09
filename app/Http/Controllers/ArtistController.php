<?php

namespace App\Http\Controllers;

use App\VideoTag;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function show($artistId)
    {
        $videos = VideoTag::join('videos', 'videos.id', '=', 'video_tags.video_id')
            ->where('video_search_keyword_id', $artistId)
            ->limit(30)
            ->orderBy('views', 'desc')
            ->get();
        return view('artists.show', ['videos' => $videos]);
    }
}
