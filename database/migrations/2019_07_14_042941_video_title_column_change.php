<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideoTitleColumnChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('channel_title')->nullable()->change();
            $table->string('live_broadcast_content')->nullable()->change();
            $table->dateTimeTz('published_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('description')->change();
            $table->string('channel_title')->change();
            $table->string('live_broadcast_content')->change();
            $table->dateTimeTz('published_at')->change();
        });
    }
}
