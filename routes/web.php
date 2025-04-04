<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

include __DIR__.'/auth.php';
include __DIR__.'/public.php';

Route::get('/dmca', function () {
    // the file is in public/documents/dmca.pdf
    $file = File::get(public_path('documents/dmca.pdf'));

    return response($file, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="dmca.pdf"');
})->name('dmca');

Route::get('/privacy-policy', function () {
    $file = File::get(public_path('documents/privacy.pdf'));

    return response($file, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="privacy-policy.pdf"');
})->name('privacy-policy');

Route::get('/terms-of-service', function () {
    $file = File::get(public_path('documents/tos.pdf'));

    return response($file, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="terms-of-service.pdf"');
})->name('terms-of-service');
