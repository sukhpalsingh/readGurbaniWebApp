<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurbaniScriptureTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurbani_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->string('punjabi')->nullable();
            $table->string('unicode')->nullable();
            $table->string('english')->nullable();
            $table->integer('angs');
        });

        Schema::create('gurbani_writers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('punjabi');
            $table->string('unicode');
            $table->string('english');
        });

        Schema::create('gurbani_raags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('punjabi');
            $table->string('unicode');
            $table->string('english');
            $table->integer('ang_from');
            $table->integer('ang_to');
            $table->string('info_english');
        });

        Schema::create('gurbani_scriptures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gurmukhi');
            $table->string('gurmukhi_unicode');
            $table->string('translation_punjabi')->nullable();
            $table->string('translation_punjabi_unicode')->nullable();
            $table->string('translation_english')->nullable();
            $table->string('translation_spanish')->nullable();
            $table->string('transliteration_english');
            $table->string('transliteration_devanagari');
            $table->string('first_letters');
            $table->string('first_letters_unicode');
            $table->integer('ang');
            $table->integer('pankti');
            $table->unsignedInteger('gurbani_source_id');
            $table->unsignedInteger('gurbani_raag_id')->nullable();
            $table->unsignedInteger('gurbani_writer_id')->nullable();

            $table->foreign('gurbani_source_id')->references('id')->on('gurbani_sources');
            $table->foreign('gurbani_raag_id')->references('id')->on('gurbani_raags');
            $table->foreign('gurbani_writer_id')->references('id')->on('gurbani_writers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
