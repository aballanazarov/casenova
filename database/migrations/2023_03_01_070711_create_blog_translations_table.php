<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('content')->nullable();

            $table->unique(['blog_id', 'locale']);
        });
    }


    public function down()
    {
        if (Schema::hasTable('blog_translations')) {
            Schema::table('blog_translations', function (Blueprint $table) {
                $table->dropForeign('blog_translations_blog_id_foreign');
                $table->drop();
            });
        }
    }
};
