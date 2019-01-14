<?php

use Illuminate\Database\Seeder;
use App\GurbaniSource;

class GurbaniSourceTableSeeder extends Seeder
{
    private $data = [
        [
            'identifier' => 'G',
            'punjabi' => 'sRI gurU gRMQ swihb jI',
            'unicode' => 'ਸ੍ਰੀ ਗੁਰੂ ਗ੍ਰੰਥ ਸਾਹਿਬ ਜੀ',
            'english' => 'Sri Guru Granth Sahib Ji',
            'angs' => 1430
        ],
        [
            'identifier' => 'D',
            'punjabi' => 'sRI dsm gRMQ',
            'unicode' => 'ਸ੍ਰੀ ਦਸਮ ਗ੍ਰੰਥ',
            'english' => 'Sri Dasam Granth',
            'angs' => 2820
        ],
        [
            'identifier' => 'B',
            'punjabi' => 'vwrW',
            'unicode' => 'ਵਾਰਾਂ',
            'english' => 'Vaaran',
            'angs' => 42
        ],
        [
            'identifier' => 'N',
            'punjabi' => 'vwrW',
            'unicode' => 'ਵਾਰਾਂ',
            'english' => 'Vaaran',
            'angs' => 1
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $row) {
            GurbaniSource::firstOrCreate($row);
        }
    }
}
