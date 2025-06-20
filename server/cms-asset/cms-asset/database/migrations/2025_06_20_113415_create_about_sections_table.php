<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->string('highlighted_text');
            $table->text('description')->nullable();
            $table->string('image_url');
            $table->json('features')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_sections');
    }
};
