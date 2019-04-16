<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SundarGutkaScripture extends Model
{
    public $table = 'sundar_gutka_scriptures';

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
        'sundar_gutka_id',
        'gurmukhi',
        'gurmukhi_unicode',
        'translation_punjabi',
        'translation_punjabi_unicode',
        'translation_english',
        'translation_spanish',
        'transliteration_english',
        'transliteration_devanagari',
        'first_letters',
        'first_letters_unicode',
        'ang',
        'pankti',
        'shabad_id',
        'serial',
        'gurbani_source_id',
        'gurbani_raag_id',
        'gurbani_writer_id'
    ];
}
