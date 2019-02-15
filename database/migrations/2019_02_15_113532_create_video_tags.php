<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('video_id');
            $table->unsignedInteger('video_search_keyword_id');

            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('video_search_keyword_id')->references('id')->on('video_search_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_tags');
    }
}
