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
        Schema::create('gifts', function (Blueprint $table) {
    $table->id();

    $table->foreignId('wedding_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('type');
    $table->string('bank_name')->nullable();
    $table->string('account_number')->nullable();
    $table->string('account_name')->nullable();

    $table->string('address')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifts');
    }
};
