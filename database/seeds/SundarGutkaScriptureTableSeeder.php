<?php

use Illuminate\Database\Seeder;
use App\SundarGutkaScripture;

class SundarGutkaScriptureTableSeeder extends Seeder
{
    private $sql = "
        INSERT INTO sundar_gutka_scriptures (sundar_gutka_id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id, serial)

        SELECT sundar_gutka_id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id, serial
        FROM
        (
            (
                SELECT 1 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1
                ORDER BY id
                LIMIT 1
            )
            
            UNION ALL
            
            (
                SELECT 2 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 1 AND shabad_id <= 39
            )
            
            UNION ALL
            
            (
                SELECT 3 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 7403 AND shabad_id <= 7424
            )
            
            UNION ALL
            
            (
                SELECT 4 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 7427
            )
            
            UNION ALL
            
            (
                SELECT 5 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 12795
                ORDER BY id
                LIMIT 102
            )
            
            UNION ALL

            (
                SELECT 6 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 3374
            )
            
            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1661
                ORDER BY id
                LIMIT 4 OFFSET 13
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 2 as serial, 2 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2776
                ORDER BY id
                LIMIT 1
                OFFSET 1
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 2 as serial, 3 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1721
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, (shabad_id - 37) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 40 AND shabad_id <= 48
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 12 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 12795
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 13 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 8096
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 14 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 8097
                ORDER BY id
                LIMIT 3
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 15 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 3374
                ORDER BY id
                LIMIT 28
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 16 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 5539
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 17 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 5540
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 18 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 3543
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 19 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1943
                ORDER BY id
                LIMIT 6
                OFFSET 2
            )

            UNION ALL

            (
                SELECT 7 AS sundar_gutka_id, 20 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 1944
            )

            UNION ALL

            (
                SELECT 9 AS sundar_gutka_id, (shabad_id - 48) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 49 AND shabad_id <= 52
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 277
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 2 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2524
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 3 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2764
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 4 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2765
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 5 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2790
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 6 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2989
            )

            UNION ALL

            (
                SELECT 10 AS sundar_gutka_id, 7 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2990
            )

            UNION ALL

            (
                SELECT 11 AS sundar_gutka_id, 20 as serial, 13 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 358
            )

            UNION ALL

            (
                SELECT 12 AS sundar_gutka_id, (shabad_id - 9465) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 9466 AND shabad_id <= 9475
            )

            UNION ALL

            (
                SELECT 13 AS sundar_gutka_id, (shabad_id - 7438) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 7439
            )

            UNION ALL

            (
                SELECT 14 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 7425 AND shabad_id <= 7441
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2532
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 2 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2637
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 3 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2639
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 4 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2641
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 5 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 4893
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 6 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 8096
            )

            UNION ALL

            (
                SELECT 15 AS sundar_gutka_id, 7 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 8097
                LIMIT 3
            )

            UNION ALL

            (
                SELECT 16 AS sundar_gutka_id, (shabad_id - 757) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 758 AND shabad_id <= 869
            )

            UNION ALL

            (
                SELECT 17 AS sundar_gutka_id, (shabad_id - 869) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 870 AND shabad_id <= 1085
            )

            UNION ALL

            (
                SELECT 18 AS sundar_gutka_id, (shabad_id - 1655) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 1656 AND shabad_id <= 1661
            )

            UNION ALL

            (
                SELECT 19 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 3405
            )

            UNION ALL

            (
                SELECT 20 AS sundar_gutka_id, (shabad_id - 3405) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 3406 AND shabad_id <= 3441
            )

            UNION ALL

            (
                SELECT 21 AS sundar_gutka_id, (shabad_id - 3582) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 3583 AND shabad_id <= 3590
            )

            UNION ALL

            (
                SELECT 22 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 4233
            )

            UNION ALL

            (
                SELECT 23 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 358
            )

            UNION ALL

            (
                SELECT 24 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 2896
            )

            UNION ALL

            (
                SELECT 25 AS sundar_gutka_id, (shabad_id - 5481) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 5482 AND shabad_id <= 5538
            )

            UNION ALL

            (
                SELECT 26 AS sundar_gutka_id, (shabad_id - 7738) as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id >= 7739 AND shabad_id <= 7741
            )

            UNION ALL

            (
                SELECT 25 AS sundar_gutka_id, 1 as serial, 1 as subserial, id, gurmukhi, gurmukhi_unicode, translation_punjabi, translation_punjabi_unicode, translation_english, translation_spanish, transliteration_english, transliteration_devanagari, first_letters, first_letters_unicode, ang, pankti, shabad_id, gurbani_source_id, gurbani_raag_id, gurbani_writer_id
                FROM gurbani_scriptures
                WHERE shabad_id = 5540
            )
        ) scriptures
        ORDER BY sundar_gutka_id, serial, subserial, shabad_id, id
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
