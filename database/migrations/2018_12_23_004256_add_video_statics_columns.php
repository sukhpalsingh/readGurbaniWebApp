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
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('favorites')->default(0);
            $table->integer('comments')->default(0);
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
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
            $table->dropColumn('favorites');
            $table->dropColumn('comments');
        });
    }
}
