<?php

namespace App\Http\Controllers;

use App\Models\Wedding;

class WeddingController extends Controller
{
    public function show(string $slug)
    {
        $wedding = Wedding::with([
            'events',
            'galleries',
            'rsvps',
            'gifts',
            'guests',
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $guestName = request()->query('to', 'Tamu Undangan');

        return view('wedding.index', compact(
            'wedding',
            'guestName'
        ));
    }

    public function home()
    {
        $wedding = Wedding::with([
            'events',
            'galleries',
            'rsvps',
            'gifts',
            'guests',
        ])->firstOrFail();

        $guestName = request()->query('to', 'Tamu Undangan');

        return view('wedding.index', compact(
            'wedding',
            'guestName'
        ));
    }

    public function showGuest(
        string $slug,
        string $guestSlug
    ) {
        $wedding = Wedding::with([
            'events',
            'galleries',
            'rsvps',
            'gifts',
            'guests',
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $guest = $wedding->guests()
            ->where('slug', $guestSlug)
            ->firstOrFail();

        $guestName = $guest->name;

        return view('wedding.index', compact(
            'wedding',
            'guestName',
            'guest'
        ));
    }
}