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
        Schema::create('guests', function (Blueprint $table) {
    $table->id();

    $table->foreignId('wedding_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('name');

    $table->string('slug');

    $table->string('phone')->nullable();

    $table->timestamps();

    $table->unique([
        'wedding_id',
        'slug',
    ]);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
