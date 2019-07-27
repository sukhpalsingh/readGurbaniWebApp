<?php

use App\DiskArtist;
use Illuminate\Database\Seeder;

class DiskArtistTableSeeder extends Seeder
{
    private $data = [
        [
            'name_pan' => 'sMq isMG jI mskIn',
            'name_eng' => 'Sant Singh Ji Maskeen',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $row) {
            DiskArtist::firstOrCreate($row);
        }
    }
}
