<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GurbaniScripture extends Model
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
        'gurmukhi',
        'gurmukhi_unicode',
        'translation_punjabi',
        'translation_punjabi_unicode',
        'devanagari_unicode',
        'translation_english',
        'translation_spanish',
        'transliteration_english',
        'transliteration_devanagari',
        'first_letters',
        'first_letters_unicode',
        'ang',
        'pankti',
        'shabad_id',
        'gurbani_source_id',
        'gurbani_raag_id',
        'gurbani_writer_id'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function gurbaniRaag()
    {
        return $this->belongsTo('App\GurbaniRaag');
    }

    /**
     * Get the user that owns the phone.
     */
    public function gurbaniWriter()
    {
        return $this->belongsTo('App\GurbaniWriter', 'gurbani_writer_id');
    }
}
