<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_navbars', function (Blueprint $table) {
            $table->id();
            $table->string('brand_prefix')->nullable();
            $table->string('brand_highlight')->nullable();
            $table->string('brand_suffix')->nullable();
            $table->string('phone')->nullable();
            $table->json('menu')->nullable();
            $table->timestamps();
        });

        Schema::create('site_heroes', function (Blueprint $table) {
            $table->id();
            $table->json('slides')->nullable();
            $table->timestamps();
        });

        Schema::create('site_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('overlay_title')->nullable();
            $table->text('overlay_description')->nullable();
            $table->string('headline')->nullable();
            $table->json('paragraphs')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('signature_name')->nullable();
            $table->timestamps();
        });

        Schema::create('site_services', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->json('items')->nullable();
            $table->timestamps();
        });

        Schema::create('site_news', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->json('items')->nullable();
            $table->json('newsletter')->nullable();
            $table->json('modal')->nullable();
            $table->timestamps();
        });

        Schema::create('site_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->json('plans')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_pricings');
        Schema::dropIfExists('site_news');
        Schema::dropIfExists('site_services');
        Schema::dropIfExists('site_abouts');
        Schema::dropIfExists('site_heroes');
        Schema::dropIfExists('site_navbars');
    }
};
