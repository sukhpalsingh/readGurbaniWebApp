<?php

namespace App\Services;

use App\SearchToken;
use App\Video;
use Carbon\Carbon;
use GuzzleHttp\Client;

class YoutubeService
{
    private $url = "https://www.googleapis.com/youtube/v3/";
    private $key;

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

    public function getNewVidoes($query)
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
                'maxResults' => '50'
            ]
        ];

        $searchToken = SearchToken::where('keyword', $query)->first();
        if (!empty($searchToken)) {
            if (!empty($searchToken->next_page_token)) {
                $params['query']['pageToken'] = $searchToken->next_page_token;
            }

            // finished
            if (empty($searchToken->next_page_token) && !empty($searchToken->prev_page_token)) {
                return [];
            }
        }

        // pageToken
        $response = $client->request(
            'GET',
            'search',
            $params
        );

        $code = $response->getStatusCode();
        if ($code === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function populateNewVideos()
    {
        $response = $this->getNewVidoes('gurbani kirtan');
        if (empty($response)) {
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

            $statisticsResponse = $this->getVideoStatistics($video->video_id);
            if (!empty($statisticsResponse)) {
                $statistics = $statisticsResponse['items'][0]['statistics'];
                $video->views = $statistics['viewCount'];
                $video->likes = $statistics['likeCount'];
                $video->dislikes = $statistics['dislikeCount'];
                $video->favorites = $statistics['favoriteCount'];
                $video->comments = $statistics['commentCount'];
                $video->save();
            }
        }

        $searchLog = SearchToken::firstOrCreate([
            'keyword' => 'gurbani kirtan'
        ]);

        $searchLog->next_page_token = null;
        if (!empty($response['nextPageToken'])) { 
            $searchLog->next_page_token = $response['nextPageToken'];
        }

        $searchLog->prev_page_token = null;
        if (!empty($response['prevPageToken'])) { 
            $searchLog->prev_page_token = $response['prevPageToken'];
        }

        $searchLog->save();
    }
}
