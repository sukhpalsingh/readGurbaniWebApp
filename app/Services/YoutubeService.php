<?php

namespace App\Services;

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

    public function getNewVidoes()
    {
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 2.0,
        ]);
        $response = $client->request(
            'GET',
            'search',
            [
                'query' => [
                    'q' => 'gurbani',
                    'part' => 'snippet',
                    'type' => 'video',
                    'key' => $this->key,
                    'order' => 'date',
                    'videoEmbeddable' => 'true',
                    'maxResults' => '50'
                ]
            ]
        );

        $code = $response->getStatusCode();
        if ($code === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function populateNewVideos()
    {
        $response = $this->getNewVidoes();
        if (empty($response)) {
            return;
        }

        foreach ($response['items'] as $item) {
            Video::firstOrCreate(
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
        }
    }
}
