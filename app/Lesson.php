<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_punjabi',
        'name_english',
        'description_punjabi',
        'description_english',
        'time_required',
        'order',
        'course_id'
    ];
}
