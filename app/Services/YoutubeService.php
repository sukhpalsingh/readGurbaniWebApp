<?php

namespace App\Services;

use App\SearchToken;
use App\SearchLog;
use App\Video;
use App\VideoTag;
use App\VideoSearchKeyword;
use Carbon\Carbon;
use GuzzleHttp\Client;

class YoutubeService
{
    private $url = "https://www.googleapis.com/youtube/v3/";
    private $key;

    public $totalCalls = 3;

    public function __construct()
    {
        $this->key = env('YOUTUBE_KEY');
    }

    public function getVideoStatistics($id)
    {
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 2.0,
        ]);
        $response = $client->request(
            'GET',
            'videos',
            [
                'query' => [
                    'id' => $id,
                    'part' => 'statistics,snippet',
                    'key' => $this->key,
                ]
            ]
        );

        $code = $response->getStatusCode();
        if ($code === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getNewVidoes($query, $checkDate, $pageToken = '')
    {
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 2.0,
        ]);

        $params = [
            'query' => [
                'q' => $query,
                'part' => 'snippet',
                'type' => 'video',
                'key' => $this->key,
                'order' => 'date',
                'videoEmbeddable' => 'true',
                'maxResults' => '50',
                'publishedAfter' => $checkDate->copy()->subDay()->format('Y-m-d') . 'T23:59:59Z',
                'publishedBefore' => $checkDate->copy()->addDay()->format('Y-m-d') . 'T00:00:00Z',
            ]
        ];

        if (!empty($pageToken)) {
            $params['query']['pageToken'] = $pageToken;
        }

        // pageToken
        $response = $client->request(
            'GET',
            'search',
            $params
        );

        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        $content = $response->getBody()->getContents();

        //save search log
        SearchLog::create([
            'params' => json_encode($params),
            'code' => $code,
            'reason' => $reason,
            'response' => $content
        ]);

        if ($code === 200) {
            return json_decode($content, true);
        }

        return [];
    }

    public function populateNewVideos()
    {
        //validate key
        if (empty($this->key)) {
            return;
        }

        // get token which was updated first
        $searchToken = SearchToken::orderBy('updated_at', 'ASC')->first();
        $checkedAtObject = Carbon::createFromFormat('Y-m-d', $searchToken->checked_at);

        // add day for checking at next date
        $checkedDate = $checkedAtObject->addDay();

        // skip checking if the current checking date is today
        if ($checkedAtObject->isToday()) {
            return;
        }

        $searchKeyword = VideoSearchKeyword::where('name', $searchToken->keyword)->first();

        // save new checking date
        $searchToken->checked_at = $checkedDate->format('Y-m-d');
        $searchToken->save();

        $hasNextToken = true;
        $pageToken = '';
        while($hasNextToken) {
            $response = $this->getNewVidoes($searchKeyword->keywords, $checkedDate, $pageToken);
            if (empty($response) || empty($response['items'])) {
                $hasNextToken = false;
                return;
            }

            foreach ($response['items'] as $item) {
                $video = Video::firstOrCreate(
                    [
                        'video_id' => $item['id']['videoId'],
                        'channel_id' => $item['snippet']['channelId'],
                    ]
                );
    
                $video->channel_title = $item['snippet']['channelTitle'];
                $video->published_at = new Carbon($item['snippet']['publishedAt']);
                $video->title = $item['snippet']['title'];
                $video->description = $item['snippet']['description'];
                $video->live_broadcast_content = $item['snippet']['liveBroadcastContent'];
                $video->save();

                if ($video->tagged === 0) {
                    $this->tagVideo($video);
                }

                $statisticsResponse = $this->getVideoStatistics($video->video_id);
                if (!empty($statisticsResponse)) {
                    $statistics = $statisticsResponse['items'][0]['statistics'];
                    $video->views = $statistics['viewCount'] ?? 0;
                    $video->likes = $statistics['likeCount'] ?? 0;
                    $video->dislikes = $statistics['dislikeCount'] ?? 0;
                    $video->favorites = $statistics['favoriteCount'] ?? 0;
                    $video->comments = $statistics['commentCount'] ?? 0;
                    $video->save();
                }
            }

            if (empty($response['nextPageToken'])) {
                $hasNextToken = false;
                return;
            }

            $pageToken = $response['nextPageToken'];
        }
    }

    public function populateLiveVideos()
    {
        //validate key
        if (empty($this->key)) {
            return;
        }

        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 2.0,
        ]);

        $params = [
            'query' => [
                'q' => '"akj samagam" OR "gurbani kirtan" OR "darbar sahib kirtan" OR "golden temple kirtan"',
                'part' => 'snippet',
                'type' => 'video',
                'key' => $this->key,
                'order' => 'date',
                'eventType' => 'live',
                'videoEmbeddable' => 'true',
                'maxResults' => '50',
            ]
        ];

        $response = $client->request(
            'GET',
            'search',
            $params
        );

        $code = $response->getStatusCode();
        $reason = $response->getReasonPhrase();
        $content = $response->getBody()->getContents();

        if ($code !== 200) {
            return;
        }

        $response = json_decode($content, true);
        if (empty($response) || empty($response['items'])) {
            return;
        }

        foreach ($response['items'] as $item) {
            $video = Video::firstOrCreate(
                [
                    'video_id' => $item['id']['videoId'],
                    'channel_id' => $item['snippet']['channelId'],
                ]
            );

            $video->channel_title = $item['snippet']['channelTitle'];
            $video->published_at = new Carbon($item['snippet']['publishedAt']);
            $video->title = $item['snippet']['title'];
            $video->description = $item['snippet']['description'];
            $video->live_broadcast_content = $item['snippet']['liveBroadcastContent'];
            $video->save();

            if ($video->tagged === 0) {
                $this->tagVideo($video);
            }

            $statisticsResponse = $this->getVideoStatistics($video->video_id);
            if (!empty($statisticsResponse)) {
                $statistics = $statisticsResponse['items'][0]['statistics'];
                $video->views = $statistics['viewCount'] ?? 0;
                $video->likes = $statistics['likeCount'] ?? 0;
                $video->dislikes = $statistics['dislikeCount'] ?? 0;
                $video->favorites = $statistics['favoriteCount'] ?? 0;
                $video->comments = $statistics['commentCount'] ?? 0;
                $video->save();
            }
        }
    }

    public function updatePreviousLiveVideos()
    {
        $liveVideos = Video::where('live_broadcast_content', 'live')
            ->get();
        foreach ($liveVideos as $video) {
            $statisticsResponse = $this->getVideoStatistics($video->video_id);
            if (! empty($statisticsResponse)) {
                $video->live_broadcast_content = $statisticsResponse['items'][0]['snippet']['liveBroadcastContent'] ?? 'None';
                $statistics = $statisticsResponse['items'][0]['statistics'] ?? [];
                $video->views = $statistics['viewCount'] ?? 0;
                $video->likes = $statistics['likeCount'] ?? 0;
                $video->dislikes = $statistics['dislikeCount'] ?? 0;
                $video->favorites = $statistics['favoriteCount'] ?? 0;
                $video->comments = $statistics['commentCount'] ?? 0;
                $video->save();
            }
        }
    }

    public function tagVideo($video)
    {
        $videoSearchKeywords = VideoSearchKeyword::get();
        foreach ($videoSearchKeywords as $videoSearchKeyword) {
            $createTag = false;
            $title = strtolower($video->title);
            $description = strtolower($video->description);

            switch ($videoSearchKeyword->name) {
                case 'Gurbani Kirtan':
                    if (
                        (
                            strpos($title, 'gurbani') !== false ||
                            strpos($title, 'shabad') !== false
                        ) &&
                        strpos($title, 'kirtan') !== false
                    ) {
                        $createTag = true;
                    } elseif (
                        (
                            strpos($description, 'gurbani') !== false ||
                            strpos($description, 'shabad') !== false
                        ) &&
                        strpos($description, 'kirtan') !== false
                    ) {
                        $createTag = true;
                    }
                    break;
                
                case 'Gurbani Kirtan':
                    if (
                        (
                            strpos($title, 'gurbani') !== false ||
                            strpos($title, 'kirtan') !== false
                        ) &&
                        (
                            strpos($title, 'katha') !== false ||
                            strpos($title, 'updesh') !== false
                        )
                    ) {
                        $createTag = true;
                    } elseif (
                        (
                            strpos($description, 'gurbani') !== false ||
                            strpos($description, 'kirtan') !== false
                        ) &&
                        (
                            strpos($description, 'katha') !== false ||
                            strpos($description, 'updesh') !== false
                        )
                    )
                    break;
                
                case "Bhai Tarlochan Singh":
                    if (
                        strpos($title, 'Bhai Tarlochan Singh') !== false ||
                        strpos($title, 'Bhai Trilochan Singh') !== false
                    ) {
                        $createTag = true;
                    } elseif (
                        strpos($description, 'Bhai Tarlochan Singh') !== false ||
                        strpos($description, 'Bhai Trilochan Singh') !== false
                    ) {
                        $createTag = true;
                    }
                    break;

                case "Sant Ranjit Singh (Dhadrian Wale)":
                    if (
                        strpos($title, 'Ranjit Singh Dhadrian Wale') !== false ||
                        strpos($title, 'Ranjit Singh Dhadrianwale') !== false
                    ) {
                        $createTag = true;
                    } elseif (
                        strpos($description, 'Ranjit Singh Dhadrian Wale') !== false ||
                        strpos($description, 'Ranjit Singh Dhadrianwale') !== false
                    ) {
                        $createTag = true;
                    }
                    break;

                default:
                    if (strpos($title, $videoSearchKeyword->keywords) !== false) {
                        $createTag = true;
                    } elseif (strpos($description, $videoSearchKeyword->keywords) !== false) {
                        $createTag = true;
                    }
                    break;
            }

            if ($createTag) {
                VideoTag::firstOrCreate([
                    'video_id' => $video->id,
                    'video_search_keyword_id' => $videoSearchKeyword->id,
                ]);
            }

            $video->tagged = 1;
            $video->save();
        }
    }
}
