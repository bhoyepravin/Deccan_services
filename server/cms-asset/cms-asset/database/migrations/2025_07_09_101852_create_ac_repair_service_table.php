<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ac_repair_services', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('page')->default('acRepair');
            $table->string('title');
            $table->string('background_image');
            
            // Video Section
            $table->string('video_url')->nullable();
            $table->string('uploaded_video_path')->nullable();
            $table->string('video_title');
            
            // Service Description
            $table->json('service_description'); // title and description array
            
            // Image Gallery
            $table->json('gallery_images');
            
            // Repair Process
            $table->json('repair_process'); // title, description, steps, note
            
            // Final Gallery
            $table->json('final_gallery_images');
            
            // CTA Section
            $table->json('cta_section'); // text, background, border
            
            // Contact Info
            $table->json('contact_info');
            
            // Meta
            $table->json('meta'); // title, description, keywords
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ac_repair_services');
    }
};