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
                    'part' => 'statistics',
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
        // get token which was updated first
        $searchToken = SearchToken::orderBy('updated_at', 'ASC')->first();
        $checkedAtObject = Carbon::createFromFormat('Y-m-d', $searchToken->checked_at);

        $searchKeyword = VideoSearchKeyword::where('name', $searchToken->keyword)->first();

        // add day for checking at next date
        $checkedDate = $checkedAtObject->addDay();

        // save new checking date
        $searchToken->checked_at = $checkedDate->format('Y-m-d');
        $searchToken->save();

        $hasNextToken = true;
        $pageToken = '';
        while($hasNextToken) {
            $response = $this->getNewVidoes($searchKeyword->keywords, $checkedDate, $pageToken);
            if (empty($response)) {
                $hasNextToken = false;
                return;
            }

            foreach ($response['items'] as $item) {
                $video = Video::firstOrCreate(
                    [
                        'video_id' => $item['id']['videoId'],
                        'title' => $item['snippet']['title'],
                        'description' => $item['snippet']['description'],
                        'channel_id' => $item['snippet']['channelId'],
                        'channel_title' => $item['snippet']['channelTitle'],
                        'published_at' => new Carbon($item['snippet']['publishedAt']),
                        'live_broadcast_content' => $item['snippet']['liveBroadcastContent'],
                    ]
                );

                VideoTag::firstOrCreate([
                    'video_id' => $video->id,
                    'video_search_keyword_id' => $searchKeyword->id,
                ]);

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
}
