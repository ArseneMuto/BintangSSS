<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', [KaryawanController::class, 'index']);

// Route CRUD Karyawan
Route::prefix('karyawan')->group(function () {
    // 1. Daftar Karyawan
    Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
    
    // 2. Form Tambah (Ubah dari 'show' ke 'create')
    Route::get('/tambah', [KaryawanController::class, 'create'])->name('karyawan.tambah');
    
    // 3. Proses Simpan
    Route::post('/simpan', [KaryawanController::class, 'store'])->name('karyawan.store');
    
    // 4. Form Edit
    Route::get('/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    
    // 5. Proses Update
    Route::put('/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    
    // 6. Proses Hapus
    Route::delete('/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');
}); 