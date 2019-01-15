<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SundarGutka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sundar_gutka', function (Blueprint $table) {
            $table->increments('id');
            $table->string('punjabi');
            $table->string('unicode')->nullable();
            $table->string('english');
            $table->integer('order');
        });

        Schema::create('sundar_gutka_scriptures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sundar_gutka_id');
            $table->text('gurmukhi');
            $table->text('gurmukhi_unicode');
            $table->text('translation_punjabi')->nullable();
            $table->text('translation_punjabi_unicode')->nullable();
            $table->text('translation_english')->nullable();
            $table->text('translation_spanish')->nullable();
            $table->text('transliteration_english')->nullable();
            $table->text('transliteration_devanagari')->nullable();
            $table->text('first_letters');
            $table->text('first_letters_unicode');
            $table->integer('ang');
            $table->integer('pankti');
            $table->unsignedInteger('shabad_id');
            $table->unsignedInteger('gurbani_source_id');
            $table->unsignedInteger('gurbani_raag_id')->nullable();
            $table->unsignedInteger('gurbani_writer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sundar_gutka');
        Schema::dropIfExists('sundar_gutka_scriptures');
    }
}
