<?php

namespace App\Models;
use App\Models\Wedding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = [
    'wedding_id',
    'image',
    'imagekit_file_id',
    'cloudinary_public_id',
    'caption',
    'sort_order',
    ];

    public function wedding(): BelongsTo
    {
        return $this->belongsTo(Wedding::class);
    }
}