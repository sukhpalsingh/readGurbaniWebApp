<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonVideo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'video_id',
        'name_punjabi',
        'name_english',
        'description_punjabi',
        'description_english',
        'length',
        'order',
        'lesson_id'
    ];
}
