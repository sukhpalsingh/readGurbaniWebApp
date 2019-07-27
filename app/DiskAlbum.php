<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiskAlbum extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_pan',
        'name_eng',
        'disk_category_id',
        'disk_genre_id',
        'serial',
    ];
}
