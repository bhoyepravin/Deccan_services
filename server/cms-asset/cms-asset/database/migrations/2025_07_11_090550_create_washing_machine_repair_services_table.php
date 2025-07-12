<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('washing_machine_repair_services', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('washingMachineRepair');
            $table->string('title');
            $table->string('background_image');
            $table->string('video_url')->nullable();
            $table->string('uploaded_video_path')->nullable();
            $table->string('video_title');
            
            // JSON fields for complex data
            $table->json('service_description');
            $table->json('gallery_images')->nullable();
            $table->json('repair_process');
            $table->json('final_gallery_images')->nullable();
            $table->json('cta_section');
            $table->json('contact_info');
            $table->json('meta');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('washing_machine_repair_services');
    }
};