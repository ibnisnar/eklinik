<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AccessRight\RoleList;
use App\Livewire\AccessRight\UserRoles;
use App\Livewire\Pages\Klinik\SenaraiKlinik;
use App\Livewire\Pages\PenggunaKlinik\SenaraiPenggunaKlinik;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\SenaraiPermohonanMaklumatPerubatan;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\SenaraiPermohonanPenambahanMaklumatPerubatan;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\TambahPermohonanPenambahan;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\SenaraiPermohonanPerubahanMaklumatPerubatan;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\TambahPermohonanPerubahan;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\Tindakan\Agensi;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\Tindakan\Doctor;
use App\Livewire\Pages\PermohonanMaklumatPerubatan\Tindakan\Pelulus;
use App\Livewire\Pages\CajRundingan\SenaraiCajRundingan;
use App\Livewire\Pages\Rawatan\SenaraiRawatan;
use App\Livewire\Pages\Ubatan\SenaraiUbatan;
use App\Livewire\Pages\UjianMakmal\SenaraiUjianMakmal;
use App\Livewire\Pages\Laporan\LaporanKedudukanTuntutanTertinggiStaff;
use App\Livewire\Pages\Laporan\LaporanPecahanRawatan;
use App\Livewire\Pages\Laporan\LaporanRingkasanTuntutanPerubatan;
use App\Livewire\Pages\Laporan\LaporanSenaraiRawatanDanUbatanStaff;
use App\Livewire\Pages\Laporan\LaporanSenaraiTuntutanInvois;
use App\Livewire\Pages\Laporan\LaporanSenaraiTuntutanStaff;
use App\Livewire\Pages\Laporan\LaporanStatistikRawatanTertinggi;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/peranan', RoleList::class)->name('roles.index');
    Route::get('/peranan-pengguna', UserRoles::class)->name('users-roles.index');

    Route::get('/klinik', SenaraiKlinik::class)->name('klinik.index');
    Route::get('/pengguna-klinik', SenaraiPenggunaKlinik::class)->name('pengguna-klinik.index');
    Route::get('/senarai-permohonan-maklumat-perubatan', SenaraiPermohonanMaklumatPerubatan::class)->name('senarai-permohonan-maklumat-perubatan.index');
    Route::get('/senarai-permohonan-penambahan-maklumat-perubatan', SenaraiPermohonanPenambahanMaklumatPerubatan::class)->name('senarai-permohonan-penambahan-maklumat-perubatan.index');
    Route::get('/permohonan-penambahan-maklumat-perubatan', TambahPermohonanPenambahan::class)->name('permohonan-penambahan-maklumat-perubatan.index');
    Route::get('/senarai-permohonan-perubahan-maklumat-perubatan', SenaraiPermohonanPerubahanMaklumatPerubatan::class)->name('senarai-permohonan-perubahan-maklumat-perubatan.index');
    Route::get('/permohonan-perubahan-maklumat-perubatan', TambahPermohonanPerubahan::class)->name('permohonan-perubahan-maklumat-perubatan.index');
    Route::get('/caj-rundingan', SenaraiCajRundingan::class)->name('caj-rundingan.index');
    Route::get('/rawatan', SenaraiRawatan::class)->name('rawatan.index');
    Route::get('/ubatan', SenaraiUbatan::class)->name('ubatan.index');
    Route::get('/ujian-makmal', SenaraiUjianMakmal::class)->name('ujian-makmal.index');
    Route::get('/laporan/kedudukan-tuntutan-tertinggi-staff', LaporanKedudukanTuntutanTertinggiStaff::class)->name('kedudukan-tuntutan-tertinggi-staff.index');
    Route::get('/laporan/pecahan-rawatan', LaporanPecahanRawatan::class)->name('pecahan-rawatan.index');
    Route::get('/laporan/ringkasan-tuntutan-perubatan', LaporanRingkasanTuntutanPerubatan::class)->name('ringkasan-tuntutan-perubatan.index');
    Route::get('/laporan/senarai-rawatan-dan-ubatan-staff', LaporanSenaraiRawatanDanUbatanStaff::class)->name('senarai-rawatan-dan-ubatan-staff.index');
    Route::get('/laporan/senarai-tuntutan-mengikut-invois', LaporanSenaraiTuntutanInvois::class)->name('senarai-tuntutan-mengikut-invois.index');
    Route::get('/laporan/senarai-tuntutan-mengikut-staff', LaporanSenaraiTuntutanStaff::class)->name('senarai-tuntutan-mengikut-staff.index');
    Route::get('/laporan/statistik-rawatan-tertinggi', LaporanStatistikRawatanTertinggi::class)->name('statistik-rawatan-tertinggi.index');


    Route::get('/tindakan-agensi/permohonan/{permohonan_no}', Agensi::class)->name('tindakan-agensi-permohonan.index');
    Route::get('/tindakan-doktor/permohonan/{permohonan_no}', Doctor::class)->name('tindakan-doctor-permohonan.index');
    Route::get('/tindakan-pelulus/permohonan/{permohonan_no}', Pelulus::class)->name('tindakan-pelulus-permohonan.index');

});

require __DIR__.'/auth.php';
