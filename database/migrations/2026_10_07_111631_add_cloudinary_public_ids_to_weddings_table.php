<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('weddings', function (Blueprint $table) {
            $table->string('cover_cloudinary_public_id')
                ->nullable()
                ->after('cover_image');

            $table->string('bride_cloudinary_public_id')
                ->nullable()
                ->after('bride_image');

            $table->string('groom_cloudinary_public_id')
                ->nullable()
                ->after('groom_image');
        });
    }

    public function down(): void
    {
        Schema::table('weddings', function (Blueprint $table) {
            $table->dropColumn([
                'cover_cloudinary_public_id',
                'bride_cloudinary_public_id',
                'groom_cloudinary_public_id',
            ]);
        });
    }
};