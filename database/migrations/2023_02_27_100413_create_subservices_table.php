<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subservices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down()
    {
        if (Schema::hasTable('subservices')) {
            Schema::table('subservices', function (Blueprint $table) {
                $table->dropForeign('subservices_service_id_foreign');
                $table->drop();
            });
        }
    }
};
