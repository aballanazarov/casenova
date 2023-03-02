<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subservice_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subservice_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->text('content')->nullable();

            $table->unique(['subservice_id', 'locale']);
        });
    }


    public function down()
    {
        if (Schema::hasTable('subservice_translations')) {
            Schema::table('subservice_translations', function (Blueprint $table) {
                $table->dropForeign('subservice_translations_subservice_id_foreign');
                $table->drop();
            });
        }
    }
};
