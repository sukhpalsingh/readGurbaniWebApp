<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoSearchKeyword extends Model
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
        'name',
        'keywords'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function videoTags()
    {
        return $this->hasMany('App\VideoTags');
    }

    /**
     * Get image path
     *
     * @return string
     */
    public function getImagePath()
    {
        $name = $this->name;
        $name = str_replace([' ', '(', ')'], ['_', '', ''], $name);
        return strtolower($name);
    }
}
