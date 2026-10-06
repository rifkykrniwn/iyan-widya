<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\RsvpExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = Admin::where('email', $credentials['email'])
            ->first();

        if (
            !$admin ||
            !Hash::check($credentials['password'], $admin->password)
        ) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput();
        }

        $request->session()->regenerate();

        $request->session()->put('admin_id', $admin->id);

        return redirect()->route('admin.dashboard');
    }
public function guests(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $search = $request->input('search');
    $status = $request->input('status');

    $guestsQuery = $wedding->guests()
        ->with(['rsvps' => function ($query) {
            $query->latest();
        }]);

    // Search nama tamu
    if ($search) {
        $guestsQuery->where('name', 'like', '%' . $search . '%');
    }

    // Filter status RSVP
    if ($status === 'belum_rsvp') {

        $guestsQuery->whereDoesntHave('rsvps');

    } elseif (in_array($status, ['hadir', 'tidak_hadir', 'ragu'])) {

        $guestsQuery->whereHas('rsvps', function ($query) use ($status) {
            $query->where('attendance', $status);
        });

    }

    $guests = $guestsQuery
        ->orderBy('name')
        ->paginate(10)
        ->withQueryString();

    // Statistik
    $totalGuests = $wedding->guests()->count();

    $rsvpedGuests = $wedding->guests()
        ->whereHas('rsvps')
        ->count();

    $belumRsvp = $totalGuests - $rsvpedGuests;

    return view('admin.guests', compact(
        'wedding',
        'guests',
        'search',
        'status',
        'totalGuests',
        'rsvpedGuests',
        'belumRsvp'
    ));
}

    public function logout(Request $request)
    {
        $request->session()->forget('admin_id');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
{
    $wedding = \App\Models\Wedding::with([
        'guests',
        'rsvps',
    ])->firstOrFail();

    $totalGuests = $wedding->guests->count();

    $rsvpedGuests = $wedding->rsvps
        ->whereNotNull('guest_id')
        ->pluck('guest_id')
        ->unique()
        ->count();

    $belumRsvp = $totalGuests - $rsvpedGuests;

    $hadir = $wedding->rsvps
        ->where('attendance', 'hadir')
        ->count();

    $tidakHadir = $wedding->rsvps
        ->where('attendance', 'tidak_hadir')
        ->count();

    $ragu = $wedding->rsvps
        ->where('attendance', 'ragu')
        ->count();

    $totalOrangHadir = $wedding->rsvps
        ->where('attendance', 'hadir')
        ->sum('guest_count');

    return view('admin.dashboard', compact(
        'wedding',
        'totalGuests',
        'rsvpedGuests',
        'belumRsvp',
        'hadir',
        'tidakHadir',
        'ragu',
        'totalOrangHadir'
    ));
}
public function rsvps(Request $request)
{
    $wedding = \App\Models\Wedding::with([
        'rsvps.guest',
    ])->firstOrFail();

    $search = $request->input('search');
    $status = $request->input('status');

    $rsvps = $wedding->rsvps
        ->filter(function ($rsvp) use ($search, $status) {

            // Filter pencarian nama
            if ($search) {
                $search = strtolower($search);

                $guestName = strtolower($rsvp->guest?->name ?? '');
                $rsvpName = strtolower($rsvp->name ?? '');

                if (
                    !str_contains($guestName, $search) &&
                    !str_contains($rsvpName, $search)
                ) {
                    return false;
                }
            }

            // Filter status
            if ($status && $rsvp->attendance !== $status) {
                return false;
            }

            return true;
        })
        ->sortByDesc('created_at');

    return view('admin.rsvps', compact(
        'wedding',
        'rsvps',
        'search',
        'status'
    ));
}
public function createGuest()
{
    return view('admin.guests-create');
}
public function storeGuest(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'phone' => ['nullable', 'string', 'max:20'],
    ]);

    $baseSlug = \Illuminate\Support\Str::slug($validated['name']);

    $slug = $baseSlug;
    $counter = 2;

    while (
        $wedding->guests()
            ->where('slug', $slug)
            ->exists()
    ) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }

    $wedding->guests()->create([
        'name' => $validated['name'],
        'slug' => $slug,
        'phone' => $validated['phone'] ?? null,
    ]);

    return redirect()
        ->route('admin.guests')
        ->with('success', 'Tamu berhasil ditambahkan.');
}
public function editGuest($guest)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $guest = $wedding->guests()
        ->where('id', $guest)
        ->firstOrFail();

    return view('admin.guests-edit', compact(
        'wedding',
        'guest'
    ));
}
public function updateGuest(Request $request, $guest)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $guest = $wedding->guests()
        ->where('id', $guest)
        ->firstOrFail();

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'phone' => ['nullable', 'string', 'max:20'],
    ]);

    $baseSlug = \Illuminate\Support\Str::slug($validated['name']);

    $slug = $baseSlug;
    $counter = 2;

    while (
        $wedding->guests()
            ->where('slug', $slug)
            ->where('id', '!=', $guest->id)
            ->exists()
    ) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }

    $guest->update([
        'name' => $validated['name'],
        'slug' => $slug,
        'phone' => $validated['phone'] ?? null,
    ]);

    return redirect()
        ->route('admin.guests')
        ->with('success', 'Data tamu berhasil diperbarui.');
}
public function deleteGuest($guest)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $guest = $wedding->guests()
        ->where('id', $guest)
        ->firstOrFail();

    $guest->delete();

    return redirect()
        ->route('admin.guests')
        ->with('success', 'Tamu berhasil dihapus.');
}
public function exportRsvps(Request $request)
{
    $search = $request->input('search');
    $status = $request->input('status');

    return Excel::download(
        new RsvpExport($search, $status),
        'data-rsvp.xlsx'
    );
}
public function settings()
{
    $wedding = \App\Models\Wedding::firstOrFail();

    return view('admin.settings', compact('wedding'));
}
public function updateSettings(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $validated = $request->validate([
        'bride_name' => ['required', 'string', 'max:100'],
        'groom_name' => ['required', 'string', 'max:100'],
        'bride_parents' => ['nullable', 'string', 'max:255'],
        'groom_parents' => ['nullable', 'string', 'max:255'],
        'wedding_date' => ['required', 'date'],
        'quote' => ['nullable', 'string', 'max:1000'],
        'address' => ['nullable', 'string', 'max:500'],
        'maps_url' => ['nullable', 'url', 'max:500'],
        'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        'bride_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        'groom_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
    ]);

    if ($request->hasFile('cover_image')) {

        $path = $request->file('cover_image')
            ->store('images/wedding', 'public');

        $validated['cover_image'] = 'storage/' . $path;
    }
    if ($request->hasFile('bride_image')) {

    $path = $request->file('bride_image')
        ->store('images/wedding', 'public');

    $validated['bride_image'] = 'storage/' . $path;
}

if ($request->hasFile('groom_image')) {

    $path = $request->file('groom_image')
        ->store('images/wedding', 'public');

    $validated['groom_image'] = 'storage/' . $path;
}
    $wedding->update($validated);

    return redirect()
        ->route('admin.settings')
        ->with('success', 'Pengaturan undangan berhasil diperbarui.');
}
public function events()
{
    $wedding = \App\Models\Wedding::with('events')->firstOrFail();

    $events = $wedding->events->sortBy('start_at');

    return view('admin.events', compact('wedding', 'events'));
}

public function createEvent()
{
    return view('admin.event-form', [
        'event' => null,
    ]);
}

public function storeEvent(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $validated = $request->validate([
        'type' => ['required', 'string', 'max:50'],
        'title' => ['required', 'string', 'max:100'],
        'start_at' => ['required', 'date'],
        'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
        'venue' => ['nullable', 'string', 'max:500'],
        'address' => ['nullable', 'string', 'max:1000'],
        'maps_url' => ['nullable', 'url', 'max:1000'],
    ]);

    $validated['wedding_id'] = $wedding->id;

    \App\Models\Event::create($validated);

    return redirect()
        ->route('admin.events')
        ->with('success', 'Acara berhasil ditambahkan.');
}

public function editEvent(\App\Models\Event $event)
{
    return view('admin.event-form', compact('event'));
}

public function updateEvent(Request $request, \App\Models\Event $event)
{
    $validated = $request->validate([
        'type' => ['required', 'string', 'max:50'],
        'title' => ['required', 'string', 'max:100'],
        'start_at' => ['required', 'date'],
        'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
        'venue' => ['nullable', 'string', 'max:500'],
        'address' => ['nullable', 'string', 'max:1000'],
        'maps_url' => ['nullable', 'url', 'max:1000'],
    ]);

    $event->update($validated);

    return redirect()
        ->route('admin.events')
        ->with('success', 'Acara berhasil diperbarui.');
}

public function deleteEvent(\App\Models\Event $event)
{
    $event->delete();

    return redirect()
        ->route('admin.events')
        ->with('success', 'Acara berhasil dihapus.');
}
public function gallery()
{
    $wedding = \App\Models\Wedding::with('galleries')->firstOrFail();

    $galleries = $wedding->galleries
        ->sortBy([
            ['sort_order', 'asc'],
            ['created_at', 'asc'],
        ]);

    return view('admin.gallery', compact('wedding', 'galleries'));
}

public function storeGallery(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $validated = $request->validate([
        'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:15360'],
        'caption' => ['nullable', 'string', 'max:255'],
    ]);

    $file = $request->file('image');

    $manager = new ImageManager(new Driver());

    $image = $manager->decodeSplFileInfo($file);

    // Batasi sisi terpanjang maksimal 2000px
    $image->scaleDown(width: 2000, height: 2000);

    // Encode ke WebP dengan kualitas 82
    $encoded = $image->encode(
    new \Intervention\Image\Encoders\WebpEncoder(quality: 82)
    );

    $filename = 'gallery-' . uniqid() . '.webp';

    $path = 'images/wedding/gallery/' . $filename;

    \Storage::disk('public')->put($path, $encoded->toString());

    $wedding->galleries()->create([
        'image' => 'storage/' . $path,
        'caption' => $validated['caption'] ?? null,
        'sort_order' => ($wedding->galleries()->max('sort_order') ?? 0) + 1,
    ]);

    return redirect()
        ->route('admin.gallery')
        ->with('success', 'Foto gallery berhasil ditambahkan.');
}
public function updateGallery(Request $request, \App\Models\Gallery $gallery)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    // Pastikan foto milik wedding yang sedang dikelola
    if ($gallery->wedding_id !== $wedding->id) {
        abort(404);
    }

    $validated = $request->validate([
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        'caption' => ['nullable', 'string', 'max:255'],
        'sort_order' => ['required', 'integer', 'min:1'],
    ]);

    // Simpan path foto lama
    $oldImage = $gallery->image;

    // Jika ada foto baru
    if ($request->hasFile('image')) {

        $path = $request->file('image')
            ->store('images/wedding/gallery', 'public');

        $validated['image'] = 'storage/' . $path;
    }

    // Update database
    $gallery->update($validated);

    // Hapus file foto lama setelah database berhasil diperbarui
    if (
        $request->hasFile('image') &&
        $oldImage &&
        \Illuminate\Support\Facades\Storage::disk('public')->exists(
            str_replace('storage/', '', $oldImage)
        )
    ) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete(
            str_replace('storage/', '', $oldImage)
        );
    }

    return redirect()
        ->route('admin.gallery')
        ->with('success', 'Foto gallery berhasil diperbarui.');
}
public function updateGalleryOrder(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $validated = $request->validate([
        'sort_order' => ['required', 'array'],
        'sort_order.*' => ['required', 'integer', 'min:1'],

        'caption' => ['nullable', 'array'],
        'caption.*' => ['nullable', 'string', 'max:255'],
    ]);

    foreach ($validated['sort_order'] as $galleryId => $sortOrder) {

        $gallery = $wedding->galleries()
            ->where('id', $galleryId)
            ->first();

        if (!$gallery) {
            continue;
        }

        $gallery->update([
            'sort_order' => $sortOrder,
            'caption' => $validated['caption'][$galleryId] ?? null,
        ]);
    }

    return redirect()
        ->route('admin.gallery')
        ->with('success', 'Gallery berhasil diperbarui.');
}
public function deleteGallery(\App\Models\Gallery $gallery)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    // Pastikan foto milik wedding yang sedang dikelola
    if ($gallery->wedding_id !== $wedding->id) {
        abort(404);
    }

    // Simpan path foto sebelum record dihapus
    $image = $gallery->image;

    // Hapus data dari database
    $gallery->delete();

    // Hapus file fisik dari storage
    if (
        $image &&
        \Illuminate\Support\Facades\Storage::disk('public')->exists(
            str_replace('storage/', '', $image)
        )
    ) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete(
            str_replace('storage/', '', $image)
        );
    }

    return redirect()
        ->route('admin.gallery')
        ->with('success', 'Foto gallery berhasil dihapus.');
}
public function gifts()
{
    $wedding = \App\Models\Wedding::with('gifts')->firstOrFail();

    $gifts = $wedding->gifts;

    return view('admin.gifts', compact(
        'wedding',
        'gifts'
    ));
}
public function storeGift(Request $request)
{
    $wedding = \App\Models\Wedding::firstOrFail();

    $validated = $request->validate([
        'type' => ['required', 'in:bank,address'],
        'bank_name' => ['nullable', 'string', 'max:100'],
        'account_number' => ['nullable', 'string', 'max:100'],
        'account_name' => ['nullable', 'string', 'max:100'],
        'address' => ['nullable', 'string', 'max:1000'],
    ]);

    $wedding->gifts()->create($validated);

    return redirect()
        ->route('admin.gifts')
        ->with('success', 'Data hadiah berhasil ditambahkan.');
}
public function updateGift(Request $request, \App\Models\Gift $gift)
{
    $validated = $request->validate([
        'type' => ['required', 'in:bank,address'],
        'bank_name' => ['nullable', 'string', 'max:100'],
        'account_number' => ['nullable', 'string', 'max:100'],
        'account_name' => ['nullable', 'string', 'max:100'],
        'address' => ['nullable', 'string', 'max:1000'],
    ]);

    $gift->update($validated);

    return redirect()
        ->route('admin.gifts')
        ->with('success', 'Data hadiah berhasil diperbarui.');
}
public function deleteGift(\App\Models\Gift $gift)
{
    $gift->delete();

    return redirect()
        ->route('admin.gifts')
        ->with('success', 'Data hadiah berhasil dihapus.');
}
}