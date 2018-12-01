<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'video_id',
        'title',
        'description',
        'channel_id',
        'channel_title',
        'live_broadcast_content',
        'published_at',
        'category',
        'views'
    ];
}
