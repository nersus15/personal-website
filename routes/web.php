<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('home');
});


// routes/web.php
$secretKey = 'kjadakada';

Route::get('/migrate', function () use ($secretKey) {
    if (request('key') !== $secretKey) {
        abort(403, 'Akses Ditolak: Kunci keamanan salah.');
    }

    try {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('config:clear');
        
        return 'Migrasi berhasil dijalankan (tanpa fresh). Output: ' . nl2br(Artisan::output());
    } catch (\Exception $e) {
        return 'Gagal menjalankan migrasi. Error: ' . nl2br($e->getMessage());
    }
});


// 2. Rute untuk menjalankan "php artisan migrate:fresh" (MENGHAPUS SEMUA TABEL)
Route::get('/migrate-fresh', function () use ($secretKey) {
    if (request('key') !== $secretKey) {
        abort(403, 'Akses Ditolak: Kunci keamanan salah.');
    }

    try {
        // Peringatan: Perintah ini akan menghapus semua tabel di database!
        Artisan::call('migrate:fresh', ['--force' => true]);
        Artisan::call('config:clear');

        return 'Migrasi FRESH (semua tabel dihapus) berhasil dijalankan. Output: ' . nl2br(Artisan::output());
    } catch (\Exception $e) {
        return 'Gagal menjalankan migrasi fresh. Error: ' . nl2br($e->getMessage());
    }
});

Route::get('/run-seed', function () use ($secretKey) {
    if (request('key') !== $secretKey) {
        abort(403, 'Akses Ditolak: Kunci keamanan salah.');
    }

    try {
        Artisan::call('db:seed', ['--force' => true]);
        
        return 'Seeding data berhasil dijalankan. Output: ' . nl2br(Artisan::output());
    } catch (\Exception $e) {
        return 'Gagal menjalankan seeding. Error: ' . nl2br($e->getMessage());
    }
});