<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('welcome', [
        "tags" => App\Models\Tag::get(),
    ]);
});

Route::post('tags', [TagController::class, 'store'])->name('tags.store');
Route::delete('tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
