<?php

use Illuminate\Database\Seeder;
use App\SundarGutkaScripture;

class SundarGutkaScriptureTableSeeder extends Seeder
{
    private $sql = "
        INSERT INTO sundar_gutka_scriptures (sundar_gutka_id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id)

        SELECT sundar_gutka_id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
        FROM
        (
            (
                SELECT 1 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1
                ORDER BY id
                LIMIT 1
            )
            
            UNION ALL
            
            (
                SELECT 2 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 1 AND shabad_id <= 39
            )
            
            UNION ALL
            
            (
                SELECT 3 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 7403 AND shabad_id <= 7424
            )
            
            UNION ALL
            
            (
                SELECT 4 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 7427
            )
            
            UNION ALL
            
            (
                SELECT 5 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 12795
                ORDER BY id
                LIMIT 102
            )
            
            UNION ALL

            (
                SELECT 6 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 3374
            )
            
            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1661
                ORDER BY id
                LIMIT 4 OFFSET 13
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 2 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 4686
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 3 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2776
                ORDER BY id
                LIMIT 1
                OFFSET 1
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 4 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1721
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 5 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 40 AND shabad_id <= 48
            )

            UNION ALL

            (
                SELECT 11 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 40 AND shabad_id <= 48
            )

            UNION ALL

            (
                SELECT 14 AS sundar_gutka_id, 1 as serial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 7425 AND shabad_id <= 7441
            )
        ) scriptures
        ORDER BY sundar_gutka_id, serial, shabad_id, id
    ";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SundarGutkaScripture::truncate();
        DB::statement($this->sql);
    }
}
