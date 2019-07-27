<?php

use App\DiskCategory;
use Illuminate\Database\Seeder;

class DiskCategoryTableSeeder extends Seeder
{
    private $data = [
        [
            'name_eng' => 'MP3',
        ],
        [
            'name_eng' => 'CD',
        ],
        [
            'name_eng' => 'VCD',
        ],
        [
            'name_eng' => 'DVD',
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
            DiskCategory::firstOrCreate($row);
        }
    }
}
