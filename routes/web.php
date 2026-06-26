<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'icad/Home')->name('home');
Route::inertia('/about', 'icad/About')->name('about');
Route::inertia('/membership', 'icad/Membership')->name('membership');
Route::inertia('/events', 'icad/Events')->name('events');
Route::inertia('/news', 'icad/News')->name('news');
Route::inertia('/partners', 'icad/Partners')->name('partners');
Route::inertia('/contact', 'icad/Contact')->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
