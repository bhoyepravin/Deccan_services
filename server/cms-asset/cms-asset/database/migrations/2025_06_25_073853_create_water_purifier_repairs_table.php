<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('water_purifier_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('description_paragraphs');
            $table->string('video_src');
            $table->string('video_title');
            $table->string('process_title');
            $table->json('process_steps');
            $table->text('process_note');
            $table->json('main_images');
            $table->json('gallery_images');
            $table->text('cta_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('water_purifier_repairs');
    }
};
