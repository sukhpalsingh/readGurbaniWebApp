<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiskAlbumTrack extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_pan',
        'name_eng',
        'duration',
        'url',
        'serial',
        'disk_album_id',
        'disk_artist_id'
    ];
}
