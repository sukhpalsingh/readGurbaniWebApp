<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GurbaniRaag extends Model
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
        'id',
        'identifier',
        'punjabi',
        'unicode',
        'english',
        'ang_from',
        'ang_to',
        'info_english',
        'gurbani_source_id'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function gurbaniSource()
    {
        return $this->belongsTo('App\GurbaniSource');
    }
}
