<?php

namespace App\Http\Controllers;

use App\VideoTag;
use App\VideoSearchKeyword;
use Illuminate\Http\Request;

class ArtistVideoController extends Controller
{
    public function index(Request $request, $artistId)
    {
        $videos = VideoTag::join('videos', 'videos.id', '=', 'video_tags.video_id')
            ->where('video_search_keyword_id', $artistId);

        $formData = $request->all();

        $formData['sort_by'] = $formData['sort_by'] ?? 'most_recent';
        switch($formData['sort_by']) {
            case 'most_recent':
                $videos->orderBy('published_at', 'desc')
                    ->orderBy('views', 'desc');
                break;

            case 'most_viewed':
                $videos->orderBy('views', 'desc')
                    ->orderBy('published_at', 'desc');
                break;
        }

        $videos = $videos->paginate(20);
        $videoSearchKeyword = VideoSearchKeyword::findOrFail($artistId);

        $pagination = [];
        $pagination['startPage'] = 1;
        if ($videos->currentPage() / 5 > 0) {
            $pagination['startPage'] = $videos->currentPage() - (
                $videos->currentPage() % 5 === 0 ? 4 : ($videos->currentPage() % 5 - 1)
            );
        }

        $pagination['endPage'] = $pagination['startPage'] + 4;
        $pagination['afterEndPage'] = $pagination['endPage'] + 1;
        if ($pagination['endPage'] > $videos->lastPage()) {
            $pagination['endPage'] = $pagination['afterEndPage'] = $videos->lastPage();
        }

        return view(
            'artists.videos.index',
            [
                'videos' => $videos,
                'videoSearchKeyword' => $videoSearchKeyword,
                'formData' => $formData,
                'pagination' => $pagination,
            ]
        );
    }
}
