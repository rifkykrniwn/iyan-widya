<?php

namespace Database\Seeders;

use App\Models\Wedding;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Gift;
use App\Models\Guest;
use Illuminate\Support\Str;
class WeddingSeeder extends Seeder
{
    public function run(): void
    {
        $wedding = Wedding::create([
            'slug' => 'widya-iyan',

            'bride_name' => 'Widya',
            'groom_name' => 'Iyan',

            'bride_parents' => 'Bapak Sudarsono & Ibu Sariyah',
            'groom_parents' => 'Bapak Sudarmanto & Ibu Sariyem',

            'wedding_date' => '2026-10-25 08:00:00',

            'quote' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri, supaya kamu mendapat ketenangan dan dijadikan-Nya di antara kamu kasih sayang.',

            'cover_image' => 'images/wedding/cover.jpeg',

            'bride_image' => 'images/wedding/couple/bride.jpg',

            'groom_image' => 'images/wedding/couple/groom.jpg',

            'address' => 'Jl. Contoh No. 123, Yogyakarta',

            'maps_url' => 'https://maps.google.com/',
        ]);
        Event::create([
        'wedding_id' => $wedding->id,

        'type' => 'akad',

        'title' => 'Akad Nikah',

        'start_at' => '2026-10-25 08:00:00',

        'end_at' => null,

        'venue' => 'Kediaman Mempelai Wanita',

        'address' => 'Jl. Contoh No. 123, Yogyakarta',

        'maps_url' => 'https://maps.google.com/',
    ]);

        Event::create([
            'wedding_id' => $wedding->id,

            'type' => 'resepsi',

            'title' => 'Resepsi Nikah',

            'start_at' => '2026-10-25 11:00:00',

            'end_at' => '2026-10-25 13:00:00',

            'venue' => 'Kediaman Mempelai Wanita',

            'address' => 'Jl. Contoh No. 123, Yogyakarta',

            'maps_url' => 'https://maps.google.com/',
        ]);
        Gallery::create([
        'wedding_id' => $wedding->id,
        'image' => 'images/wedding/gallery/photo-1.jpg',
        'caption' => 'Momen bersama',
        'sort_order' => 1,
        ]);

        Gallery::create([
            'wedding_id' => $wedding->id,
            'image' => 'images/wedding/gallery/photo-2.jpg',
            'caption' => 'Perjalanan kami',
            'sort_order' => 2,
        ]);

        Gallery::create([
            'wedding_id' => $wedding->id,
            'image' => 'images/wedding/gallery/photo-3.jpg',
            'caption' => 'Momen bahagia',
            'sort_order' => 3,
        ]);

        Gallery::create([
            'wedding_id' => $wedding->id,
            'image' => 'images/wedding/gallery/photo-4.jpg',
            'caption' => 'Kenangan',
            'sort_order' => 4,
        ]);

        Gallery::create([
            'wedding_id' => $wedding->id,
            'image' => 'images/wedding/gallery/photo-5.jpg',
            'caption' => 'Bersama',
            'sort_order' => 5,
        ]);

        Gallery::create([
            'wedding_id' => $wedding->id,
            'image' => 'images/wedding/gallery/photo-6.jpg',
            'caption' => 'Menuju hari bahagia',
            'sort_order' => 6,
        ]);
        Gift::create([
        'wedding_id' => $wedding->id,

        'type' => 'bank',

        'bank_name' => 'BCA',

        'account_number' => '1234567890',

        'account_name' => 'Widya Wahyun Wulandari',
    ]);

    Gift::create([
        'wedding_id' => $wedding->id,

        'type' => 'bank',

        'bank_name' => 'BRI',

        'account_number' => '9876543210',

        'account_name' => 'Iyan Zanuria',
    ]);
        
        Gift::create([
        'wedding_id' => $wedding->id,
        'type' => 'bank',
        'bank_name' => 'BRI',
        'account_number' => '9876543210',
        'account_name' => 'Iyan Zanuria',
    ]);


    Guest::create([
        'wedding_id' => $wedding->id,
        'name' => 'Rifki Kurniawan',
        'slug' => Str::slug('Rifki Kurniawan'),
        'phone' => '081234567890',
    ]);

    Guest::create([
        'wedding_id' => $wedding->id,
        'name' => 'Riska',
        'slug' => Str::slug('Riska'),
        'phone' => '081298765432',
    ]);

    Guest::create([
        'wedding_id' => $wedding->id,
        'name' => 'Reza',
        'slug' => Str::slug('Reza'),
        'phone' => '081211223344',
    ]);
    
    }   
}