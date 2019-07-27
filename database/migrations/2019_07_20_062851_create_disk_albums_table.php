<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiskAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disk_albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_pan')->nullable();
            $table->string('name_eng')->nullable();
            $table->unsignedInteger('disk_category_id');
            $table->unsignedInteger('disk_genres_id');
            $table->unsignedInteger('serial');
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
        Schema::dropIfExists('disk_albums');
    }
}
