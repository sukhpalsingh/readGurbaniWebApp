<?php

use Illuminate\Database\Seeder;
use App\DiskGenre;

class DiskGenreTableSeeder extends Seeder
{
    private $data = [
        [
            'name_pan' => 'kIrqn',
            'name_eng' => 'Kirtan',
        ],
        [
            'name_pan' => 'kQw',
            'name_eng' => 'Katha',
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
            DiskGenre::firstOrCreate($row);
        }
    }
}
