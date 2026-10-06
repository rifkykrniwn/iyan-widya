<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Wedding;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request, string $slug)
    {
        $wedding = Wedding::where('slug', $slug)
            ->firstOrFail();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'attendance' => [
                'required',
                'in:hadir,tidak_hadir,ragu',
            ],

            'guest_count' => [
                'required',
                'integer',
                'min:1',
                'max:10',
            ],

            'message' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);

        $wedding->rsvps()->create($validated);

return redirect()
    ->route('wedding.show', $wedding->slug)
    ->withFragment('wishes')
    ->with('success', 'Terima kasih, RSVP Anda telah berhasil dikirim.');
        }
        public function storeForGuest(
    Request $request,
    string $slug,
    string $guestSlug
) {
    $wedding = Wedding::where('slug', $slug)
        ->firstOrFail();

    $guest = $wedding->guests()
        ->where('slug', $guestSlug)
        ->firstOrFail();

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'attendance' => ['required', 'in:hadir,tidak_hadir,ragu'],
        'guest_count' => ['required', 'integer', 'min:1', 'max:10'],
        'message' => ['nullable', 'string', 'max:500'],
    ]);

    $validated['guest_id'] = $guest->id;

    $wedding->rsvps()->create($validated);

    return redirect()
        ->route('wedding.guest', [
            'slug' => $wedding->slug,
            'guestSlug' => $guest->slug,
        ])
        ->withFragment('wishes')
        ->with(
            'success',
            'Terima kasih, RSVP Anda telah berhasil dikirim.'
        );
}
}