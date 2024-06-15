<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengurusanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laman-utama', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/laman-utama', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('laman-utama');
Route::get('/invoice', function () {
    return view('invoice');
})->middleware(['auth', 'verified'])->name('invoice');
Route::get('/quotation', function () {
    return view('quotation');
})->middleware(['auth', 'verified'])->name('quotation');

Route::get('/permohonan', function () {
    return view('permohonan');
})->middleware(['auth', 'verified'])->name('permohonan');

Route::get('/senarai-permohonan', function () {
    return view('senarai-permohonan');
})->middleware(['auth', 'verified'])->name('senarai-permohonan');

// Routes for different roles
Route::middleware(['auth', 'role:Pelulus BSM'])->group(function () {
    Route::get('/pelulus-bsm', function () {
        return 'Pelulus BSM Dashboard';
    });
});

Route::middleware(['auth', 'role:Penyemak BSM'])->group(function () {
    Route::get('/penyemak-bsm', function () {
        return 'Penyemak BSM Dashboard';
    });
});

Route::middleware(['auth', 'role:Agensi'])->group(function () {
    Route::get('/agensi', function () {
        return 'Agensi Dashboard';
    });
});

// Route::middleware(['auth', 'role:Klinik'])->group(function () {
//     Route::get('/senarai-klinik', [PengurusanController::class, 'senaraiKlinik'])->name('senarai-klinik');
//     Route::post('/store/klinik', [PengurusanController::class, 'storeKlinik'])->name('store.klinik');
//     Route::post('/update/klinik', [PengurusanController::class, 'updateKlinik'])->name('update.klinik');
//     Route::post('/delete/klinik', [PengurusanController::class, 'deleteKlinik'])->name('delete.klinik');
//     Route::get('/senarai-pengguna-klinik', [PengurusanController::class, 'senaraiPenggunaKlinik'])->name('senarai-pengguna-klinik');
//     Route::post('/store/pengguna/klinik', [PengurusanController::class, 'storePenggunaKlinik'])->name('store.klinik');
//     Route::post('/update/pengguna/klinik', [PengurusanController::class, 'updatePenggunaKlinik'])->name('update.klinik');
//     Route::post('/delete/pengguna/klinik', [PengurusanController::class, 'deletePenggunaKlinik'])->name('delete.klinik');
// });

// Route::middleware(['auth', 'role:Admin JU'])->group(function () {
//     Route::get('/pengurusan-profil-bod', [PengurusanController::class, 'senaraiBOD'])->name('pengurusan-profil-bod');
//     Route::post('/store/bod', [PengurusanController::class,'storeBOD'])->name('store.bod');
//     Route::post('/update/bod', [PengurusanController::class,'updateBOD'])->name('update.bod');
//     Route::post('/delete/bod', [PengurusanController::class,'deleteBOD'])->name('delete.bod');
//     Route::post('/store/tanggungan', [PengurusanController::class,'storeTanggungan'])->name('store.tanggungan');
//     Route::post('/update/tanggungan', [PengurusanController::class,'updateTanggungan'])->name('update.tanggungan');
//     Route::post('/delete/tanggungan', [PengurusanController::class,'deleteTanggungan'])->name('delete.tanggungan');
// });

Route::middleware(['auth', 'role:Admin JU'])->group(function () {
    Route::get('/senarai-profil-bod', [PengurusanController::class, 'senaraiBOD'])->name('senarai-profil-bod');
    Route::post('/store/bod', [PengurusanController::class,'storeBOD'])->name('store.bod');
    Route::post('/update/bod', [PengurusanController::class,'updateBOD'])->name('update.bod');
    Route::post('/delete/bod', [PengurusanController::class,'deleteBOD'])->name('delete.bod');
    Route::post('/store/tanggungan', [PengurusanController::class,'storeTanggungan'])->name('store.tanggungan');
    Route::post('/update/tanggungan', [PengurusanController::class,'updateTanggungan'])->name('update.tanggungan');
    Route::post('/delete/tanggungan', [PengurusanController::class,'deleteTanggungan'])->name('delete.tanggungan');
    Route::get('/senarai-klinik', [PengurusanController::class, 'senaraiKlinik'])->name('senarai-klinik');
    Route::post('/store/klinik', [PengurusanController::class, 'storeKlinik'])->name('store.klinik');
    Route::post('/update/klinik', [PengurusanController::class, 'updateKlinik'])->name('update.klinik');
    Route::post('/delete/klinik', [PengurusanController::class, 'deleteKlinik'])->name('delete.klinik');
    Route::get('/senarai-pengguna-klinik', [PengurusanController::class, 'senaraiPenggunaKlinik'])->name('senarai-pengguna-klinik');
    Route::post('/store/pengguna/klinik', [PengurusanController::class, 'storePenggunaKlinik'])->name('store.pengguna-klinik');
    Route::post('/update/pengguna/klinik', [PengurusanController::class, 'updatePenggunaKlinik'])->name('update.pengguna-klinik');
    Route::post('/delete/pengguna/klinik', [PengurusanController::class, 'deletePenggunaKlinik'])->name('delete.pengguna-klinik');
    Route::get('/senarai-caj-rundingan', [PengurusanController::class, 'senaraiCajRundingan'])->name('senarai-caj-rundingan');
    Route::post('/store/caj-rundingan', [PengurusanController::class, 'storeCajRundingan'])->name('store.caj-rundingan');
    Route::post('/update/caj-rundingan', [PengurusanController::class, 'updateCajRundingan'])->name('update.caj-rundingan');
    Route::post('/delete/caj-rundingan', [PengurusanController::class, 'deleteCajRundingan'])->name('delete.caj-rundingan');
    Route::get('/senarai-rawatan', [PengurusanController::class, 'senaraiRawatan'])->name('senarai-rawatan');
    Route::post('/store/rawatan', [PengurusanController::class, 'storeRawatan'])->name('store.rawatan');
    Route::post('/update/rawatan', [PengurusanController::class, 'updateRawatan'])->name('update.rawatan');
    Route::post('/delete/rawatan', [PengurusanController::class, 'deleteRawatan'])->name('delete.rawatan');
    Route::get('/senarai-ubatan', [PengurusanController::class, 'senaraiUbatan'])->name('senarai-ubatan');
    Route::post('/store/ubatan', [PengurusanController::class, 'storeUbatan'])->name('store.ubatan');
    Route::post('/update/ubatan', [PengurusanController::class, 'updateUbatan'])->name('update.ubatan');
    Route::post('/delete/ubatan', [PengurusanController::class, 'deleteUbatan'])->name('delete.ubatan');
    Route::get('/senarai-ujian-makmal', [PengurusanController::class, 'senaraiUjianMakmal'])->name('senarai-ujian-makmal');
    Route::post('/store/ujian-makmal', [PengurusanController::class, 'storeUjianMakmal'])->name('store.ujian-makmal');
    Route::post('/update/ujian-makmal', [PengurusanController::class, 'updateUjianMakmal'])->name('update.ujian-makmal');
    Route::post('/delete/ujian-makmal', [PengurusanController::class, 'deleteUjianMakmal'])->name('delete.ujian-makmal');
    Route::get('/senarai-permohonan-penambahan', [PengurusanController::class, 'senaraiPermohonanPenambahan'])->name('senarai-permohonan-penambahan');
    Route::post('/store/permohonan-penambahan', [PengurusanController::class, 'storePermohonanPenambahan'])->name('store.permohonan-penambahan');
    Route::post('/delete/permohonan-penambahan', [PengurusanController::class, 'deletePermohonanPenambahan'])->name('delete.permohonan-penambahan');
    Route::get('/senarai-permohonan-perubahan', [PengurusanController::class, 'senaraiPermohonanPerubahan'])->name('senarai-permohonan-perubahan');
    Route::post('/store/permohonan-perubahan', [PengurusanController::class, 'storePermohonanPerubahan'])->name('store.permohonan-perubahan');
    Route::post('/delete/permohonan-perubahan', [PengurusanController::class, 'deletePermohonanPerubahan'])->name('delete.permohonan-perubahan');
    Route::get('/senarai-permohonan-maklumat-rawatan', [PengurusanController::class, 'senaraiPermohonanMaklumatRawatan'])->name('senarai-permohonan-maklumat-rawatan');
    Route::post('/store/tindakan-agensi/permohonan', [PengurusanController::class, 'TindakanPenambahanAgensi'])->name('store.tindakan-penambahan-agensi');
    Route::post('/store/tindakan-agensi/perubahan', [PengurusanController::class, 'TindakanPerubahanAgensi'])->name('store.tindakan-perubahan-agensi');
    Route::post('/store/tindakan-doktor/permohonan', [PengurusanController::class, 'TindakanPenambahanDoktor'])->name('store.tindakan-penambahan-doktor');
    Route::post('/store/tindakan-doktor/perubahan', [PengurusanController::class, 'TindakanPerubahanDoktor'])->name('store.tindakan-perubahan-doktor');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
