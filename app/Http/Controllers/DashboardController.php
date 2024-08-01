<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilBod;
use App\Models\TanggunganBod;
use App\Models\Klinik;
use App\Models\UserKlinik;
use App\Models\CajRundingan;
use App\Models\Rawatan;
use App\Models\Ubatan;
use App\Models\UjianMakmal;
use App\Models\PermohonanPenambahan;
use App\Models\PermohonanPerubahan;
use App\Models\TindakanAgensi;

class DashboardController extends Controller
{
    public function adminDashboard(Request $request){
        $countBOD = 0;
        $carian = $request->input('carian');
        $idpekerja = $request->input('idpekerja');
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        
        // Fetch BODs based on search query
        $listBOD = ProfilBod::where('bod_dependents_name', 'like', "%$carian%")
            ->orWhere('bod_staff_id', 'like', "%$carian%")
            ->orWhere('bod_ic', 'like', "%$carian%")
            ->orWhere('bod_phone', 'like', "%$carian%")
            ->orWhere('bod_email', 'like', "%$carian%")
            ->orWhere('bod_address', 'like', "%$carian%")
            ->get();
        
        return view('pages.profil-bod.index', compact('listBOD', 'countBOD', 'idpekerja', 'kemaskini', 'profil', 'hapus'));
    }

    public function agensiDashboard(Request $request){
        return view('pages.dashboard.agensi');
    }

    public function klinikDashboard(Request $request){
        return view('pages.dashboard.klinik');
    }

    public function penyemakDashboard(Request $request){
        return view('pages.dashboard.penyemak');
    }

    public function penyokongDashboard(Request $request){
        return view('pages.dashboard.penyokong');
    }

    public function doctorDashboard(Request $request){
        return view('pages.dashboard.doctor');
    }
}
