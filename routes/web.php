<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminKonselingController;
use App\Http\Controllers\Siswa\HasilKonselingController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| PUBLIC EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/

Route::prefix('ekstrakurikuler')
    ->name('ekstrakurikuler.')
    ->group(function () {

        Route::get(
            '/',
            [EkstrakurikulerController::class, 'publicIndex']
        )->name('index');

        Route::get(
            '/{id}',
            [EkstrakurikulerController::class, 'publicShow']
        )->name('show');

    });

/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/dashboard', function () {

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('siswa.dashboard');

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTH AREA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | DASHBOARD
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/dashboard',
                [DashboardController::class, 'admin']
            )->name('dashboard');

            /*
            |--------------------------------------------------------------------------
            | HASIL KONSELING
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/hasil-konseling',
                [AdminKonselingController::class, 'index']
            )->name('hasil-konseling.index');

            /*
            |--------------------------------------------------------------------------
            | EKSTRAKURIKULER
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'ekstrakurikuler',
                EkstrakurikulerController::class
            );

            /*
            |--------------------------------------------------------------------------
            | HAPUS GALERI EKSTRAKURIKULER
            |--------------------------------------------------------------------------
            */

            Route::delete(
                '/galeri-ekstrakurikuler/{id}',
                [EkstrakurikulerController::class, 'hapusGaleri']
            )->name('galeri.destroy');

        });

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:siswa')
        ->prefix('siswa')
        ->name('siswa.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | DASHBOARD
            |--------------------------------------------------------------------------
            */

            Route::get('/dashboard', function () {

                return view('siswa.dashboard');

            })->name('dashboard');

            /*
            |--------------------------------------------------------------------------
            | RIWAYAT KONSELING
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/riwayat-konseling',
                [\App\Http\Controllers\Siswa\RiwayatKonselingController::class, 'index']
            )->name('riwayat.index');

            Route::get(
                '/riwayat-konseling/{id}',
                [\App\Http\Controllers\Siswa\RiwayatKonselingController::class, 'show']
            )->name('riwayat.show');

            Route::delete(
                '/riwayat-konseling/{id}',
                [\App\Http\Controllers\Siswa\RiwayatKonselingController::class, 'destroy']
            )->name('riwayat.destroy');

            /*
            |--------------------------------------------------------------------------
            | HASIL KONSELING PDF
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/hasil-konseling/pdf',
                [HasilKonselingController::class, 'downloadPdf']
            )->name('hasil.pdf');

            /*
            |--------------------------------------------------------------------------
            | DOWNLOAD PDF DETAIL RIWAYAT
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/riwayat/{id}/pdf',
                [HasilKonselingController::class, 'downloadPdfDetail']
            )->name('hasil.pdf.detail');

            /*
            |--------------------------------------------------------------------------
            | PROFIL
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/profil',
                [ProfileController::class, 'edit']
            )->name('profil');

            Route::patch(
                '/profil',
                [ProfileController::class, 'update']
            )->name('profil.update');

            /*
            |--------------------------------------------------------------------------
            | KONSELING
            |--------------------------------------------------------------------------
            */

            Route::prefix('konseling')
                ->name('konseling.')
                ->group(function () {

                    Route::get(
                        '/',
                        [KonselingController::class, 'index']
                    )->name('index');

                    Route::post(
                        '/',
                        [KonselingController::class, 'store']
                    )->name('store');

                });

            /*
            |--------------------------------------------------------------------------
            | EKSTRAKURIKULER SISWA
            |--------------------------------------------------------------------------
            */

            Route::prefix('ekstrakurikuler')
                ->name('ekstrakurikuler.')
                ->group(function () {

                    Route::get(
                        '/',
                        [EkstrakurikulerController::class, 'siswa']
                    )->name('index');

                    Route::get(
                        '/{id}',
                        [EkstrakurikulerController::class, 'showSiswa']
                    )->name('show');

                });

            /*
            |--------------------------------------------------------------------------
            | MENU LAIN
            |--------------------------------------------------------------------------
            */

            Route::view('/jadwal', 'siswa.jadwal')
                ->name('jadwal');

            Route::view('/progress', 'siswa.progress')
                ->name('progress');

            Route::view('/pengumuman', 'siswa.pengumuman')
                ->name('pengumuman');

        });

});

require __DIR__ . '/auth.php';