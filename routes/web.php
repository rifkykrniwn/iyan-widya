<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\WeddingController;
use App\Models\Wedding;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    
    Route::get('/settings', [AdminController::class, 'settings'])
    ->name('admin.settings');

    Route::put('/settings', [AdminController::class, 'updateSettings'])
    ->name('admin.settings.update');

    Route::get('/guests', [AdminController::class, 'guests'])
        ->name('admin.guests');

Route::get('/guests/import', [AdminController::class, 'importGuestsForm'])
    ->name('admin.guests.import');

Route::post('/guests/import', [AdminController::class, 'importGuests'])
    ->name('admin.guests.import.store');

    Route::get('/guests/create', [AdminController::class, 'createGuest'])
        ->name('admin.guests.create');

    Route::post('/guests', [AdminController::class, 'storeGuest'])
        ->name('admin.guests.store');

    Route::get('/rsvps', [AdminController::class, 'rsvps'])
        ->name('admin.rsvps');

    Route::get('/rsvps/export', [AdminController::class, 'exportRsvps'])
    ->name('admin.rsvps.export');

    Route::post('/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');

    Route::get('/guests/{guest}/edit', [AdminController::class, 'editGuest'])
    ->name('admin.guests.edit');

    Route::put('/guests/{guest}', [AdminController::class, 'updateGuest'])
    ->name('admin.guests.update');
    Route::delete('/guests/{guest}', [AdminController::class, 'deleteGuest'])
    ->name('admin.guests.delete');
    Route::get('/events', [AdminController::class, 'events'])
    ->name('admin.events');

    Route::get('/events/create', [AdminController::class, 'createEvent'])
        ->name('admin.events.create');

    Route::post('/events', [AdminController::class, 'storeEvent'])
        ->name('admin.events.store');

    Route::get('/events/{event}/edit', [AdminController::class, 'editEvent'])
        ->name('admin.events.edit');

    Route::put('/events/{event}', [AdminController::class, 'updateEvent'])
        ->name('admin.events.update');

    Route::delete('/events/{event}', [AdminController::class, 'deleteEvent'])
        ->name('admin.events.delete');
    Route::get('/gallery', [AdminController::class, 'gallery'])
        ->name('admin.gallery');

    Route::post('/gallery', [AdminController::class, 'storeGallery'])
        ->name('admin.gallery.store');

    Route::post('/gallery/order', [AdminController::class, 'updateGalleryOrder'])
    ->name('admin.gallery.order');
    Route::put('/gallery/{gallery}', [AdminController::class, 'updateGallery'])
    ->name('admin.gallery.update');
    Route::delete('/gallery/{gallery}', [AdminController::class, 'deleteGallery'])
    ->name('admin.gallery.delete');

    Route::get('/gifts', [AdminController::class, 'gifts'])
    ->name('admin.gifts');

    Route::post('/gifts', [AdminController::class, 'storeGift'])
        ->name('admin.gifts.store');
    Route::put('/gifts/{gift}', [AdminController::class, 'updateGift'])
    ->name('admin.gifts.update');

    Route::delete('/gifts/{gift}', [AdminController::class, 'deleteGift'])
        ->name('admin.gifts.delete');
        
});


/*
|--------------------------------------------------------------------------
| Wedding Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $wedding = Wedding::firstOrFail();

    return redirect()->route('wedding.show', [
        'slug' => $wedding->slug,
    ]);
});

Route::post('/{slug}/rsvp', [RsvpController::class, 'store'])
    ->name('wedding.rsvp');

Route::post('/{slug}/{guestSlug}/rsvp', [RsvpController::class, 'storeForGuest'])
    ->name('wedding.guest.rsvp');

Route::get('/{slug}/{guestSlug}', [WeddingController::class, 'showGuest'])
    ->name('wedding.guest');

Route::get('/{slug}', [WeddingController::class, 'show'])
    ->name('wedding.show');