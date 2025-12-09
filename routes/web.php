<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});


// routes/web.php

// ... rute-rute Anda yang lain

Route::get('/run-migrate-securely', function () {
    // Pastikan Anda membatasi akses ke rute ini di lingkungan produksi
    // Misalnya, hanya izinkan jika aplikasi tidak dalam mode produksi
    if (app()->environment('production')) {
        // Anda bisa tambahkan pemeriksaan IP atau kunci keamanan di sini
        // Misalnya: if (request('key') !== 'kunci-rahasia-anda') { abort(404); }
        // Untuk saat ini, kita anggap Anda akan segera menghapusnya.
    }

    try {
        // Hentikan proses jika ada error yang muncul dari solusi sebelumnya
        // (Seperti error string length, pastikan AppServiceProvider sudah diperbarui!)
        Artisan::call('migrate', ['--force' => true]); 
        
        // Membersihkan cache konfigurasi (penting setelah deploy)
        Artisan::call('config:clear');

        return 'Migrasi dan Konfigurasi berhasil dijalankan! (Output: ' . Artisan::output() . ')';
    } catch (\Exception $e) {
        return 'Gagal menjalankan migrasi. Error: ' . $e->getMessage();
    }
});