<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SundarGutka extends Model
{
    public $table = 'sundar_gutka';

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
        'id',
        'punjabi',
        'unicode',
        'english'
    ];

    public function scriptures()
    {
        return $this->hasMany('App\SundarGutkaScripture');
    }
}
