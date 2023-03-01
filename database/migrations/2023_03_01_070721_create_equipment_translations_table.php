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
        Schema::create('equipment_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('title')->nullable();

            $table->unique(['equipment_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('equipment_translations')) {
            Schema::table('equipment_translations', function (Blueprint $table) {
                $table->dropForeign('equipment_translations_equipment_id_foreign');
                $table->drop();
            });
        }
    }
};
