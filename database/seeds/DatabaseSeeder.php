<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // $this->call(GurbaniSourceTableSeeder::class);
        // $this->call(SundarGutkaTableSeeder::class);
        // $this->call(SundarGutkaScriptureTableSeeder::class);
        // $this->call(VideoSearchKeywordTableSeeder::class);
        $this->call(DiskCategoryTableSeeder::class);
        $this->call(DiskGenreTableSeeder::class);
        $this->call(DiskArtistTableSeeder::class);
    }
}
