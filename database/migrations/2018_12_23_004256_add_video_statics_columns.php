<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoStaticsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('videos', function (Blueprint $table) {
            $table->integer('views');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('favorites');
            $table->integer('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('videos', function (Blueprint $table) {
            $table->dropColumn('views');
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
            $table->dropColumn('favorites');
            $table->dropColumn('comments');
        });
    }
}
