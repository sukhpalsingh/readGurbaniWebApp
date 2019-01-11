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
            $table->integer('ang_from')->nullable();
            $table->integer('ang_to')->nullable();
            $table->string('info_english')->nullable();
        });

        Schema::create('gurbani_scriptures', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('gurbani_scriptures');
        Schema::dropIfExists('gurbani_sources');
        Schema::dropIfExists('gurbani_writers');
        Schema::dropIfExists('gurbani_raags');
    }
}
