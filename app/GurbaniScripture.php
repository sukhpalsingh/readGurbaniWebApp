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
        'pankti'
    ];
}
