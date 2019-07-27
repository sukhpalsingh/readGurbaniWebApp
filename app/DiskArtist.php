<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiskArtist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_pan',
        'name_eng',
    ];
}
