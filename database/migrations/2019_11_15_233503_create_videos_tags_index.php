<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTagsIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_tags', function (Blueprint $table) {
            $table->index(['video_id', 'video_search_keyword_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_tags', function (Blueprint $table) {
            $table->dropIndex('video_tags_video_id_video_search_keyword_id_index');
        });
    }
}
