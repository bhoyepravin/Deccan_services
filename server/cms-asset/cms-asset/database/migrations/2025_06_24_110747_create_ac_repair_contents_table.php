<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ac_repair_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('process_title');
            $table->text('process_description');
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
        Schema::dropIfExists('ac_repair_contents');
    }
};
