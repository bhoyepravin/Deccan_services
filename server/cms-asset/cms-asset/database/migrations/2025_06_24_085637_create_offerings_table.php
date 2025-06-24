<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('offerings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon_class');
            $table->text('description');
            $table->string('image_url');
            $table->string('color');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offerings');
    }
};