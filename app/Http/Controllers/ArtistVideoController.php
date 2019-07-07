<?php

namespace App\Http\Controllers;

use App\VideoTag;
use App\VideoSearchKeyword;
use Illuminate\Http\Request;

class ArtistVideoController extends Controller
{
    public function index($artistId)
    {
        $videos = VideoTag::join('videos', 'videos.id', '=', 'video_tags.video_id')
            ->where('video_search_keyword_id', $artistId)
            ->limit(30)
            ->orderBy('views', 'desc')
            ->get();

        $videoSearchKeyword = VideoSearchKeyword::findOrFail($artistId);

        return view('artists.videos.index', ['videos' => $videos, 'videoSearchKeyword' => $videoSearchKeyword]);
    }
}
