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
        Schema::create('subservices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_id');

            $table->string('name_ru', 255)->nullable();
            $table->string('name_uz', 255)->nullable();
            $table->string('name_en', 255)->nullable();

            $table->text('content_ru')->nullable();
            $table->text('content_uz')->nullable();
            $table->text('content_en')->nullable();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::table('subservices', function (Blueprint $table) {
            $table->dropForeign('subservices_service_id_foreign');
            $table->dropIfExists();
        });
    }
};
