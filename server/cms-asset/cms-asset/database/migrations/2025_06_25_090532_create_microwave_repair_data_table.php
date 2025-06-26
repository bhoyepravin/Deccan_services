<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('microwave_repair_data', function (Blueprint $table) {
            $table->id();
            $table->json('service_description');
            $table->json('images');
            $table->json('repair_process');
            $table->json('cta_content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('microwave_repair_data');
    }
};