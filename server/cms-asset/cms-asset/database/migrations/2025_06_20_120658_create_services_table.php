<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('service_sections', function (Blueprint $table) {
    $table->id();
    $table->string('section_title');
    $table->string('highlighted_text');
    $table->text('description');
    $table->string('cta_text');
    $table->string('cta_link');
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
