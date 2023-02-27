<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->string('title_ru', 255)->nullable();
            $table->string('title_uz', 255)->nullable();
            $table->string('title_en', 255)->nullable();

            $table->text('content_ru')->nullable();
            $table->text('content_uz')->nullable();
            $table->text('content_en')->nullable();

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
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
};
