<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyword',
        'created_at',
    ];
}
