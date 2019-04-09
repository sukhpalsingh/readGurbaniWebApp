<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'video_id',
        'video_search_keyword_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function videoSearchKeyword()
    {
        return $this->belongsTo('App\VideoSearchKeyword');
    }

    /**
     * Get the video that owns the video tag.
     */
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
