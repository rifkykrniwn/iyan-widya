<?php

namespace App\Models;
use App\Models\Event;
use App\Models\Gift;
use App\Models\Gallery;
use App\Models\Rsvp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wedding extends Model
{
        protected $fillable = [
        'slug',
        'bride_name',
        'groom_name',
        'bride_parents',
        'groom_parents',
        'wedding_date',
        'quote',
        'cover_image',
        'cover_cloudinary_public_id',
        'bride_image',
        'bride_cloudinary_public_id',
        'groom_image',
        'groom_cloudinary_public_id',
        'address',
        'maps_url',
    ];

    protected $casts = [
        'wedding_date' => 'datetime',
    ];
    public function events(): HasMany
        {
            return $this->hasMany(Event::class);
        }
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class)
            ->orderBy('sort_order');
    }
    public function rsvps(): HasMany
    {
        return $this->hasMany(Rsvp::class);
    }
    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class);
    }
    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }
}