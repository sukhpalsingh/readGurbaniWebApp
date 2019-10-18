<?php

namespace App\Http\Controllers;

use App\Video;
use App\VideoSearchKeyword;
use App\VideoTag;
use Illuminate\Http\Request;
use DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formData = $request->all();

        $formData['sort_by'] = $formData['sort_by'] ?? 'most_recent';
        switch($formData['sort_by']) {
            case 'most_recent':
                $videos = Video::orderBy('published_at', 'desc');
                break;

            case 'most_viewed':
                $videos = Video::orderBy('views', 'desc')
                    ->orderBy('published_at', 'desc');
                break;
        }

        $isLive = isset($formData['live']) ? true : false;
        if ($isLive) {
            $videos->where('live_broadcast_content', 'live');
        }

        $videos->where('tagged', true);
        $videos = $videos->paginate(20);

        $artists = VideoTag::groupBy('video_search_keyword_id')
            ->select('video_search_keyword_id', DB::raw('count(video_search_keyword_id) as count'))
            ->orderBy('count', 'desc')
            ->get(['video_search_keyword_id', 'count']);

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

        if ($pagination['afterEndPage'] > $videos->lastPage()) {
            $pagination['afterEndPage'] = $videos->lastPage();
        }

        return view(
            'videos.index',
            [
                'videos' => $videos,
                'pagination' => $pagination,
                'artists' => $artists,
                'formData' => $formData,
                'isLive' => $isLive
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', ['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
