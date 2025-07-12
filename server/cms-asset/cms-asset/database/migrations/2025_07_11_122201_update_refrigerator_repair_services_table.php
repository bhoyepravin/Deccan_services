<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('refrigerator_repair_services', function (Blueprint $table) {
            // Make page field required with default value
            $table->string('page')->default('RefrigeratorRepairservice')->change();
            
            // Add any other missing fields or modifications
            $table->string('video_title')->nullable()->change();
            $table->json('cta_section')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('refrigerator_repair_services', function (Blueprint $table) {
            // Revert changes if needed
            $table->string('page')->default(null)->change();
        });
    }
};