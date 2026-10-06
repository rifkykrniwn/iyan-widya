<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            $table->string('bride_name');
            $table->string('groom_name');

            $table->string('bride_parents')->nullable();
            $table->string('groom_parents')->nullable();

            $table->dateTime('wedding_date');

            $table->text('quote')->nullable();

            $table->string('cover_image')->nullable();
            $table->string('bride_image')->nullable();
            $table->string('groom_image')->nullable();

            $table->text('address')->nullable();
            $table->text('maps_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};