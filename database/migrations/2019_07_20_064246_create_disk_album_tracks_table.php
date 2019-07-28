<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiskAlbumTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disk_album_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_pan')->nullable();
            $table->string('name_eng')->nullable();
            $table->integer('duration')->nullable();
            $table->text('url')->nullable();
            $table->unsignedInteger('serial')->default(1);
            $table->unsignedInteger('disk_album_id');
            $table->unsignedInteger('disk_artist_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disk_album_tracks');
    }
}
