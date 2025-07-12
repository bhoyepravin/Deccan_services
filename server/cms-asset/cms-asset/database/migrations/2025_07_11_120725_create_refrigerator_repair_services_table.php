<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('refrigerator_repair_services', function (Blueprint $table) {
            $table->id();
            $table->string('page')->unique();
            $table->string('title');
            $table->string('background_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('uploaded_video_path')->nullable();
            $table->string('video_title')->nullable();
            $table->json('service_description')->nullable();
            $table->json('gallery_images')->nullable();
            $table->json('repair_process')->nullable();
            $table->json('final_gallery_images')->nullable();
            $table->json('cta_section')->nullable();
            $table->json('contact_info')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('refrigerator_repair_services');
    }
};