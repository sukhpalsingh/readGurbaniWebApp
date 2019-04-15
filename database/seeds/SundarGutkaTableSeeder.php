<?php

use App\SundarGutka;
use Illuminate\Database\Seeder;

class SundarGutkaTableSeeder extends Seeder
{
    private $data = [
        [
            'punjabi' => 'mUl mMqr',
            'unicode' => null,
            'english' => 'Mool Mantar',
            'order' => 1
        ],
        [
            'punjabi' => 'jpujI swihb',
            'unicode' => null,
            'english' => 'Japji Sahib',
            'order' => 2
        ],
        [
            'punjabi' => 'jwp swihb',
            'unicode' => null,
            'english' => 'Jaap Sahib',
            'order' => 3
        ],
        [
            'punjabi' => 'qÍpRswid sÍXy',
            'unicode' => null,
            'english' => 'Tvaiprasad Svaiye',
            'order' => 4
        ],
        [
            'punjabi' => 'cOpeI swihb',
            'unicode' => null,
            'english' => 'Chaupai Sahib',
            'order' => 5
        ],
        [
            'punjabi' => 'AnMdu swihb',
            'unicode' => null,
            'english' => 'Anand Sahib',
            'order' => 6
        ],
        [
            'punjabi' => 'rhrwis swihb',
            'unicode' => null,
            'english' => 'Rehraas Sahib',
            'order' => 7
        ],
        [
            'punjabi' => 'r~iKAw dy Sbd',
            'unicode' => null,
            'english' => 'Rakhia Day Shabad',
            'order' => 8
        ],
        [
            'punjabi' => 'kIrqn soihlw',
            'unicode' => null,
            'english' => 'Kirtan Sohila',
            'order' => 9
        ],
        [
            'punjabi' => 'Sbd hjwry',
            'unicode' => null,
            'english' => 'Shabad Hazary',
            'order' => 10
        ],
        [
            'punjabi' => 'bwrh mwhw mWJ',
            'unicode' => null,
            'english' => 'Barah Maha Majh',
            'order' => 11
        ],
        [
            'punjabi' => 'Sbd hjwry pw: 10',
            'unicode' => null,
            'english' => 'Shabad Hazaray P:10',
            'order' => 12
        ],
        [
            'punjabi' => 'sÍXy dInn',
            'unicode' => null,
            'english' => 'Svaiye Deenan',
            'order' => 13
        ],
        [
            'punjabi' => 'Akwl ausqiq',
            'unicode' => null,
            'english' => 'Akal Ustat',
            'order' => 14
        ],
        [
            'punjabi' => 'AwrqI',
            'unicode' => null,
            'english' => 'Artee',
            'order' => 15
        ],
        [
            'punjabi' => 'bwvn AKrI',
            'unicode' => null,
            'english' => 'Bavan Akhri',
            'order' => 16
        ],
        [
            'punjabi' => 'suKmnI swihb',
            'unicode' => null,
            'english' => 'Sukhmani Sahib',
            'order' => 17
        ],
        [
            'punjabi' => 'Awsw dI vwr',
            'unicode' => null,
            'english' => 'Asa Di Var',
            'order' => 18
        ],
        [
            'punjabi' => 'dKxI EAMkwr',
            'unicode' => null,
            'english' => 'Dakhni Onkar',
            'order' => 19
        ],
        [
            'punjabi' => 'isD gosit',
            'unicode' => null,
            'english' => 'Sidh Gosht',
            'order' => 20
        ],
        [
            'punjabi' => 'rwmklI kI vwr',
            'unicode' => null,
            'english' => 'Ramkali Ki Vaar',
            'order' => 21
        ],
        [
            'punjabi' => 'bsMq kI vwr',
            'unicode' => null,
            'english' => 'Basant Ki Vaar',
            'order' => 22
        ],
        [
            'punjabi' => 'bwrh mwhw mWJ',
            'unicode' => null,
            'english' => 'Barah Maha Majh',
            'order' => 23
        ],
        [
            'punjabi' => 'lwvW',
            'unicode' => null,
            'english' => 'Lavaa',
            'order' => 24
        ],
        [
            'punjabi' => 'slok mhlw 9',
            'unicode' => null,
            'english' => 'Salok Mahalla 9',
            'order' => 25
        ],
        [
            'punjabi' => 'cMfI dI vwr',
            'unicode' => null,
            'english' => 'Chandi Di Vaar',
            'order' => 26
        ],
        [
            'punjabi' => 'rwgmwlw',
            'unicode' => null,
            'english' => 'Raag Mala',
            'order' => 27
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SundarGutka::truncate();
        foreach ($this->data as $row) {
            SundarGutka::firstOrCreate($row);
        }
    }
}
