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
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class PengurusanController extends Controller
{
    public function senaraiBOD(Request $request){
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
    public function storeBOD(Request $request){
        $request->validate([
            'bod_dependents_name' => 'required|string|max:255',
            'bod_staff_id' => 'required|string|max:255',
            'bod_ic' => 'required|string|max:255',
            'bod_phone' => 'required|string|max:255',
            'bod_email' => 'required|string|email|max:255',
            'bod_address' => 'required|string',
        ]);

        ProfilBod::create([
            'bod_dependents_name' => $request->bod_dependents_name,
            'bod_staff_id' => $request->bod_staff_id,
            'bod_ic' => $request->bod_ic,
            'bod_phone' => $request->bod_phone,
            'bod_email' => $request->bod_email,
            'bod_address' => $request->bod_address,
            'bod_remark' => $request->bod_remark ?? '',
            'bod_status' => '1',
        ]);

        // Redirect or return response as needed
        return redirect()->back()->with('message', 'BOD information added successfully');
    }
    public function updateBOD(Request $request){
        $request->validate([
            'bod_id' => 'required|integer',
            'bod_dependents_name' => 'required|string|max:255',
            'bod_staff_id' => 'required|string|max:255',
            'bod_ic' => 'required|string|max:255',
            'bod_phone' => 'required|string|max:255',
            'bod_email' => 'required|string|email|max:255',
            'bod_address' => 'required|string',
        ]);

        $bod = ProfilBod::find($request->bod_id);

        $bod->bod_staff_id = $request->bod_staff_id;
        $bod->bod_dependents_name = $request->bod_dependents_name;
        $bod->bod_ic = $request->bod_ic;
        $bod->bod_phone = $request->bod_phone;
        $bod->bod_address = $request->bod_address;
        $bod->bod_email = $request->bod_email;
        $bod->save();

        return redirect()->back()->with('message', 'BOD updated successfully');
    }
    public function deleteBOD(Request $request){
        $request->validate([
            'bod_id' => 'required|integer',
            'bod_staff_id' => 'required',
        ]);
        $bod = ProfilBod::find($request->bod_id);
        if ($bod->bod_staff_id === $request->bod_staff_id) {
            $bod->delete();
            return redirect()->route('pengurusan-profil-bod')->with('message', 'BOD deleted successfully');
        }else{
            return redirect()->route('pengurusan-profil-bod')->with('message', 'ID Pekerja tidak sesuai');
        }
    }
    public function storeTanggungan(Request $request){
        $request->validate([
            'bod_id' => 'required|integer',
            'bod_dependents_name' => 'required|string|max:255',
            'bod_dependents_ic' => 'required|string|max:255',
            'bod_dependents_age' => 'required|string|max:255',
            'bod_dependents_relations' => 'required|string|max:255',
            'bod_dependents_remark' => 'required|string|max:255',
        ]);

        $tanggungan = TanggunganBod::create([
            'bod_id' => $request->bod_id,
            'bod_dependents_name' => $request->bod_dependents_name,
            'bod_dependents_ic' => $request->bod_dependents_ic,
            'bod_dependents_age' => $request->bod_dependents_age,
            'bod_dependents_relations' => $request->bod_dependents_relations,
            'bod_dependents_remark' => $request->bod_dependents_remark,
            'bod_dependents_status' => '1',
        ]);

        // Redirect manually
        return redirect()->back()->with('message', 'Tanggungan BOD information added successfully');
    }
    public function updateTanggungan(Request $request){
        $request->validate([
            'tanggungan_id' => 'required|integer',
            'bod_dependents_name' => 'required|string|max:255',
            'bod_dependents_ic' => 'required|string|max:255',
            'bod_dependents_age' => 'required|string|max:255',
            'bod_dependents_relations' => 'required|string|max:255',
            'bod_dependents_remark' => 'required|string|max:255',
        ]);

        $tanggungan = TanggunganBod::find($request->tanggungan_id);

        $tanggungan->bod_dependents_name = $request->bod_dependents_name;
        $tanggungan->bod_dependents_ic = $request->bod_dependents_ic;
        $tanggungan->bod_dependents_age = $request->bod_dependents_age;
        $tanggungan->bod_dependents_relations = $request->bod_dependents_relations;
        $tanggungan->bod_dependents_remark = $request->bod_dependents_remark;
        $tanggungan->save();

        return redirect()->back()->with('message', 'Tanggungan BOD updated successfully');
    }
    public function deleteTanggungan(Request $request){
        $request->validate([
            'tanggungan_id' => 'required|integer',
        ]);
        $tanggungan = TanggunganBod::find($request->tanggungan_id);
        $tanggungan->delete();
        return redirect()->back()->with('message', 'Tanggungan BOD deleted successfully');
    }
    public function senaraiKlinik(Request $request){
        $countKlinik = 0;
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        $carian = $request->input('carian');
        
        // Fetch BODs based on search query
        $listKlinik = Klinik::where('clinic_name', 'like', "%$carian%")
            ->orWhere('clinic_branch', 'like', "%$carian%")
            ->orWhere('clinic_ssm', 'like', "%$carian%")
            ->orWhere('clinic_type', 'like', "%$carian%")
            ->orWhere('clinic_prefix', 'like', "%$carian%")
            ->orWhere('clinic_address', 'like', "%$carian%")
            ->get();
        
        return view('pages.klinik.index', compact('listKlinik', 'countKlinik', 'kemaskini', 'profil', 'hapus'));
    }
    public function storeKlinik(Request $request){
        $request->validate([
            'clinic_name' => 'required|string|max:255',
            'clinic_branch' => 'required|string|max:255',
            'clinic_address' => 'required|string|max:255',
            'clinic_ssm' => 'required|string|max:255',
            'clinic_type' => 'required|string|max:255',
            'clinic_prefix' => 'required|string|max:255',
        ]);

        Klinik::create([
            'clinic_name' => $request->clinic_name,
            'clinic_branch' => $request->clinic_branch,
            'clinic_address' => $request->clinic_address,
            'clinic_ssm' => $request->clinic_ssm,
            'clinic_type' => $request->clinic_type,
            'clinic_prefix' => $request->clinic_prefix,
            'clinic_status' => '1',
        ]);

        return redirect()->back()->with('message', 'Klinik information added successfully');
    }
    public function updateKlinik(Request $request){
        $request->validate([
            'clinic_id' => 'required|integer',
            'clinic_name' => 'required|string|max:255',
            'clinic_branch' => 'required|string|max:255',
            'clinic_address' => 'required|string|max:255',
            'clinic_ssm' => 'required|string|max:255',
            'clinic_type' => 'required|string|max:255',
            'clinic_prefix' => 'required|string|max:255',
        ]);

        $klinik = Klinik::find($request->clinic_id);

        $klinik->clinic_name = $request->clinic_name;
        $klinik->clinic_branch = $request->clinic_branch;
        $klinik->clinic_address = $request->clinic_address;
        $klinik->clinic_ssm = $request->clinic_ssm;
        $klinik->clinic_type = $request->clinic_type;
        $klinik->clinic_prefix = $request->clinic_prefix;
        $klinik->save();

        return redirect()->back()->with('message', 'Klinik updated successfully');
    }
    public function deleteKlinik(Request $request){
        $request->validate([
            'clinic_id' => 'required|integer',
            'clinic_ssm' => 'required|string',
        ]);

        $klinik = Klinik::find($request->clinic_id);

        if ($klinik && $klinik->clinic_ssm === $request->clinic_ssm) {
            $klinik->delete();
            return redirect()->route('senarai-klinik')->with('message', 'Klinik deleted successfully');
        } else {
            return redirect()->route('senarai-klinik')->with('message', 'No. SSM tidak sesuai');
        }
    }
    public function senaraiPenggunaKlinik(Request $request){
        $countPengguna = 0;
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        $carian = $request->input('carian');
        
        $listPengguna = UserKlinik::with('klinik')->where('user_clinic_name', 'like', "%$carian%")
            ->orWhere('user_clinic_type', 'like', "%$carian%")
            ->orWhere('user_clinic_reference_id', 'like', "%$carian%")
            ->orWhere('user_clinic_email', 'like', "%$carian%")
            ->orWhere('user_clinic_fk_clinic', 'like', "%$carian%")
            ->orWhere('user_clinic_roles', 'like', "%$carian%")
            ->get();
        
        return view('pages.pengguna-klinik.index', compact('listPengguna', 'countPengguna', 'kemaskini', 'profil', 'hapus'));
    }
    public function storePenggunaKlinik(Request $request){
        $request->validate([
            'user_clinic_name' => 'required|string|max:255',
            'user_clinic_type' => 'required|string|max:255',
            'user_clinic_reference_id' => 'required|string|max:255',
            'user_clinic_email' => 'required|string|max:255',
            'user_clinic_fk_clinic' => 'required|string|max:255',
            'user_clinic_roles' => 'required|string|max:255',
        ]);

        UserKlinik::create([
            'user_clinic_name' => $request->user_clinic_name,
            'user_clinic_type' => $request->user_clinic_type,
            'user_clinic_reference_id' => $request->user_clinic_reference_id,
            'user_clinic_email' => $request->user_clinic_email,
            'user_clinic_fk_clinic' => $request->user_clinic_fk_clinic,
            'user_clinic_roles' => $request->user_clinic_roles,
            'clinic_status' => '1',
        ]);

        return redirect()->back()->with('message', 'Pengguna Klinik information added successfully');
    }
    public function updatePenggunaKlinik(Request $request){
        $request->validate([
            'user_clinic_id' => 'required|string',
            'user_clinic_name' => 'required|string|max:255',
            'user_clinic_type' => 'required|string|max:255',
            'user_clinic_reference_id' => 'required|string|max:255',
            'user_clinic_email' => 'required|string|max:255',
            'user_clinic_fk_clinic' => 'required|string|max:255',
            'user_clinic_roles' => 'required|string|max:255',
        ]);

        $penggunaKlinik = UserKlinik::find($request->user_clinic_id);

        $penggunaKlinik->user_clinic_name = $request->user_clinic_name;
        $penggunaKlinik->user_clinic_type = $request->user_clinic_type;
        $penggunaKlinik->user_clinic_reference_id = $request->user_clinic_reference_id;
        $penggunaKlinik->user_clinic_email = $request->user_clinic_email;
        $penggunaKlinik->user_clinic_fk_clinic = $request->user_clinic_fk_clinic;
        $penggunaKlinik->user_clinic_roles = $request->user_clinic_roles;
        $penggunaKlinik->save();

        return redirect()->back()->with('message', 'Pengguna Klinik updated successfully');
    }
    public function deletePenggunaKlinik(Request $request){
        $request->validate([
            'user_clinic_id' => 'required|integer',
            'user_clinic_email' => 'required',
        ]);
        $penggunaKlinik = UserKlinik::find($request->user_clinic_id);
        if ($penggunaKlinik->user_clinic_email === $request->user_clinic_email) {
            $penggunaKlinik->delete();
            return redirect()->route('senarai-pengguna-klinik')->with('message', 'Pengguna Klinik deleted successfully');
        }else{
            return redirect()->route('senarai-pengguna-klinik')->with('message', 'Email tidak sesuai');
        }
    }
    public function senaraiCajRundingan(Request $request){
        $countCajRundingan = 0;
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        $carian = $request->input('carian');
        
        $listCajRundingan = CajRundingan::with('klinik')->where('caj_rundingan_name', 'like', "%$carian%")
            ->orWhere('caj_rundingan_amaun', 'like', "%$carian%")
            ->orWhere('caj_rundingan_fk_clinic', 'like', "%$carian%")
            ->get();
        
        return view('pages.caj-rundingan.index', compact('listCajRundingan', 'countCajRundingan', 'kemaskini', 'profil', 'hapus'));
    }
    public function storeCajRundingan(Request $request){
        $request->validate([
            'caj_rundingan_name' => 'required|string|max:255',
            'caj_rundingan_amaun' =>  'required|numeric',
            'caj_rundingan_fk_clinic' => 'required|string',
        ]);

        CajRundingan::create([
            'caj_rundingan_name' => $request->caj_rundingan_name,
            'caj_rundingan_amaun' => $request->caj_rundingan_amaun,
            'caj_rundingan_fk_clinic' => $request->caj_rundingan_fk_clinic,
            'caj_rundingan_status' => '1',
        ]);

        return redirect()->back()->with('message', 'Caj Rundingan information added successfully');
    }
    public function updateCajRundingan(Request $request){
        $request->validate([
            'caj_rundingan_id' => 'required|string',
            'caj_rundingan_name' => 'required|string|max:255',
            'caj_rundingan_amaun' =>  'required|numeric',
            'caj_rundingan_fk_clinic' => 'required|string',
        ]);

        $cajRundingan = CajRundingan::find($request->caj_rundingan_id);

        $cajRundingan->caj_rundingan_name = $request->caj_rundingan_name;
        $cajRundingan->caj_rundingan_amaun = $request->caj_rundingan_amaun;
        $cajRundingan->caj_rundingan_fk_clinic = $request->caj_rundingan_fk_clinic;
        $cajRundingan->caj_rundingan_status = $request->caj_rundingan_status;
        $cajRundingan->save();

        return redirect()->back()->with('message', 'Caj Rundingan updated successfully');
    }
    public function deleteCajRundingan(Request $request){
        $request->validate([
            'caj_rundingan_id' => 'required|integer',
        ]);
        $cajRundingan = CajRundingan::find($request->caj_rundingan_id);
        $cajRundingan->delete();
        return redirect()->route('senarai-caj-rundingan')->with('message', 'Caj Rundingan deleted successfully');
    }
    public function senaraiRawatan(Request $request){
        $countRawatan = 0;
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        $carian = $request->input('carian');
        
        $listRawatan = Rawatan::with('klinik')->where('rawatan_name', 'like', "%$carian%")
            ->orWhere('rawatan_fk_clinic', 'like', "%$carian%")
            ->get();
        
        return view('pages.rawatan.index', compact('listRawatan', 'countRawatan', 'kemaskini', 'profil', 'hapus'));
    }
    public function storeRawatan(Request $request){
        $request->validate([
            'rawatan_name' => 'required|string|max:255',
            'rawatan_fk_clinic' => 'required|string',
        ]);

        Rawatan::create([
            'rawatan_name' => $request->rawatan_name,
            'rawatan_fk_clinic' => $request->rawatan_fk_clinic,
            'rawatan_status' => '1',
        ]);

        return redirect()->back()->with('message', 'Rawatan information added successfully');
    }
    public function updateRawatan(Request $request){
        $request->validate([
            'rawatan_id' => 'required|string',
            'rawatan_name' => 'required|string|max:255',
            'rawatan_fk_clinic' => 'required|string',
            'rawatan_status' => 'required|string',
        ]);

        $rawatan = Rawatan::find($request->rawatan_id);

        $rawatan->rawatan_name = $request->rawatan_name;
        $rawatan->rawatan_fk_clinic = $request->rawatan_fk_clinic;
        $rawatan->rawatan_status = $request->rawatan_status;
        $rawatan->save();

        return redirect()->back()->with('message', 'Rawatan updated successfully');
    }
    public function deleteRawatan(Request $request){
        $request->validate([
            'rawatan_id' => 'required|integer',
        ]);
        $rawatan = Rawatan::find($request->rawatan_id);
        $rawatan->delete();
        return redirect()->route('senarai-rawatan')->with('message', 'Rawatan deleted successfully');
    }
    public function senaraiUbatan(Request $request){
        $countUbatan = 0;
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        $carian = $request->input('carian');
        
        $listUbatan = Ubatan::with('klinik')->where('ubatan_name', 'like', "%$carian%")
            ->orWhere('ubatan_fk_clinic', 'like', "%$carian%")
            ->get();
        
        return view('pages.ubatan.index', compact('listUbatan', 'countUbatan', 'kemaskini', 'profil', 'hapus'));
    }
    public function storeUbatan(Request $request){
        $request->validate([
            'ubatan_name' => 'required|string|max:255',
            'ubatan_amaun' => 'required|numeric',
            'ubatan_fk_clinic' => 'required|string',
        ]);

        Ubatan::create([
            'ubatan_name' => $request->ubatan_name,
            'ubatan_amaun' => $request->ubatan_amaun,
            'ubatan_fk_clinic' => $request->ubatan_fk_clinic,
            'ubatan_status' => '1',
        ]);

        return redirect()->back()->with('message', 'Ubatan information added successfully');
    }
    public function updateUbatan(Request $request){

        $request->validate([
            'ubatan_id' => 'required|integer',
            'ubatan_name' => 'required|string|max:255',
            'ubatan_amaun' => 'required|numeric',
            'ubatan_fk_clinic' => 'required|string',
        ]);

        $ubatan = Ubatan::find($request->ubatan_id);
        $ubatan->ubatan_name = $request->ubatan_name;
        $ubatan->ubatan_amaun = $request->ubatan_amaun;
        $ubatan->ubatan_fk_clinic = $request->ubatan_fk_clinic;
        $ubatan->ubatan_status = $request->ubatan_status;
        $ubatan->save();

        return redirect()->back()->with('message', 'Ubatan updated successfully');
    }
    public function deleteUbatan(Request $request){
        $request->validate([
            'ubatan_id' => 'required|integer',
        ]);
        $ubatan = Ubatan::find($request->ubatan_id);
        $ubatan->delete();
        return redirect()->route('senarai-ubatan')->with('message', 'Ubatan deleted successfully');
    }
    public function senaraiUjianMakmal(Request $request){
        $countUjianMakmal = 0;
        $kemaskini = $request->input('kemaskini');
        $profil = $request->input('profil');
        $hapus = $request->input('hapus');
        $carian = $request->input('carian');
        
        $listUjianMakmal = UjianMakmal::with('klinik')->where('ujian_makmal_name', 'like', "%$carian%")
            ->orWhere('ujian_makmal_fk_clinic', 'like', "%$carian%")
            ->get();
        
        return view('pages.ujian-makmal.index', compact('listUjianMakmal', 'countUjianMakmal', 'kemaskini', 'profil', 'hapus'));
    }
    public function storeUjianMakmal(Request $request){
        $request->validate([
            'ujian_makmal_name' => 'required|string|max:255',
            'ujian_makmal_amaun' => 'required|numeric',
            'ujian_makmal_fk_clinic' => 'required|string',
            'ujian_makmal_lab' => 'required|string|max:255',
        ]);

        UjianMakmal::create([
            'ujian_makmal_name' => $request->ujian_makmal_name,
            'ujian_makmal_amaun' => $request->ujian_makmal_amaun,
            'ujian_makmal_fk_clinic' => $request->ujian_makmal_fk_clinic,
            'ujian_makmal_lab' => $request->ujian_makmal_lab,
            'ujian_makmal_status' => '1',
        ]);

        return redirect()->back()->with('message', 'Ujian Makmal information added successfully');
    }
    public function updateUjianMakmal(Request $request){

        $request->validate([
            'ujian_makmal_id' => 'required|integer',
            'ujian_makmal_name' => 'required|string|max:255',
            'ujian_makmal_amaun' => 'required|numeric',
            'ujian_makmal_fk_clinic' => 'required|string',
            'ujian_makmal_lab' => 'required|string|max:255',
        ]);

        $ujianMakmal = UjianMakmal::find($request->ujian_makmal_id);
        $ujianMakmal->ujian_makmal_name = $request->ujian_makmal_name;
        $ujianMakmal->ujian_makmal_amaun = $request->ujian_makmal_amaun;
        $ujianMakmal->ujian_makmal_fk_clinic = $request->ujian_makmal_fk_clinic;
        $ujianMakmal->ujian_makmal_lab = $request->ujian_makmal_lab;
        $ujianMakmal->ujian_makmal_status = $request->ujian_makmal_status;
        $ujianMakmal->save();

        return redirect()->back()->with('message', 'Ujian Makmal updated successfully');
    }
    public function deleteUjianMakmal(Request $request){
        $request->validate([
            'ujian_makmal_id' => 'required|integer',
        ]);
        $ujianMakmal = UjianMakmal::find($request->ujian_makmal_id);
        $ujianMakmal->delete();
        return redirect()->route('senarai-ujian-makmal')->with('message', 'Ujian Makmal deleted successfully');
    }
    public function senaraiPermohonanPenambahan(Request $request){
        $countPermohonan = 0;
        $permohonan = $request->input('permohonan');
        $carian = $request->input('carian');
        
        $listPermohonan = PermohonanPenambahan::with('keterangan')->where('application_date', 'like', "%$carian%")
            ->orWhere('application_no', 'like', "%$carian%")
            ->get();
        
        return view('pages.permohonan-penambahan.index', compact('listPermohonan', 'countPermohonan', 'permohonan'));
    }
    public function storePermohonanPenambahan(Request $request){
        $request->validate([
            'application_date' => 'required',
            'application_no' => 'required|string',
            'application_fk_clinic' => 'required',
            'application_fk_user' => 'required',
            'application_type' => 'required|array',
            'application_type.*' => 'required|string',
            'application_item' => 'required|array',
            'application_item.*' => 'required|string',
            'application_amaun' => 'required|array',
            'application_amaun.*' => 'required|numeric',
        ]);
        $permohonan = PermohonanPenambahan::create([
            'application_date' => $request->application_date,
            'application_no' => $request->application_no,
            'application_fk_clinic' => $request->application_fk_clinic,
            'application_fk_user' => $request->application_fk_user,
            'application_status' => '1',
        ]);

        if ($permohonan) {
            foreach ($request->application_type as $index => $type) {
                $permohonan->keterangan()->create([
                    'application_type' => $type,
                    'application_item' => $request->application_item[$index],
                    'application_amaun' => $request->application_amaun[$index],
                ]);
            }
            
            return redirect()->back()->with('message', 'Permohonan Penambahan information added successfully');
        } else {
            return redirect()->back()->with('message', 'Failed to create Permohonan Penambahan');
        }
    }
    public function deletePermohonanPenambahan(Request $request){
        $request->validate([
            'ujian_makmal_id' => 'required|integer',
        ]);
        $ujianMakmal = PermohonanPenambahan::find($request->ujian_makmal_id);
        $ujianMakmal->delete();
        return redirect()->route('senarai-ujian-makmal')->with('message', 'Ujian Makmal deleted successfully');
    }
    public function senaraiPermohonanPerubahan(Request $request){
        $countPermohonan = 0;
        $permohonan = $request->input('permohonan');
        $carian = $request->input('carian');
        
        $listPermohonan = PermohonanPerubahan::with('keterangan')->where('application_date', 'like', "%$carian%")
            ->orWhere('application_no', 'like', "%$carian%")
            ->get();
        
        return view('pages.permohonan-perubahan.index', compact('listPermohonan', 'countPermohonan', 'permohonan'));
    }
    public function storePermohonanPerubahan(Request $request){
        $request->validate([
            'application_date' => 'required',
            'application_no' => 'required|string',
            'application_fk_clinic' => 'required',
            'application_fk_user' => 'required',
            'application_type' => 'required|array',
            'application_type.*' => 'required|string',
            'application_item' => 'required|array',
            'application_item.*' => 'required|string',
            'application_amaun' => 'required|array',
            'application_amaun.*' => 'required|numeric',
        ]);
        $permohonan = PermohonanPerubahan::create([
            'application_date' => $request->application_date,
            'application_no' => $request->application_no,
            'application_fk_clinic' => $request->application_fk_clinic,
            'application_fk_user' => $request->application_fk_user,
            'application_status' => '1',
        ]);

        if ($permohonan) {
            foreach ($request->application_type as $index => $type) {
                $permohonan->keterangan()->create([
                    'application_type' => $type,
                    'application_item' => $request->application_item[$index],
                    'application_amaun' => $request->application_amaun[$index],
                ]);
            }
            
            return redirect()->back()->with('message', 'Permohonan Perubahan information added successfully');
        } else {
            return redirect()->back()->with('message', 'Failed to create Permohonan Perubahan');
        }
    }
    public function deletePermohonanPerubahan(Request $request){
        $request->validate([
            'ujian_makmal_id' => 'required|integer',
        ]);
        $ujianMakmal = PermohonanPerubahan::find($request->ujian_makmal_id);
        $ujianMakmal->delete();
        return redirect()->route('senarai-permohonan-perubahan')->with('message', 'Permohonan Perubahan deleted successfully');
    }
    public function senaraiPermohonanMaklumatRawatan(Request $request){
        $countPermohonan = 0;
        $countPenambahan = 0;
        $countPerubahan = 0;
        $tindakan = $request->input('tindakan');
        $carian = $request->input('carian');
        
        $listPenambahan = PermohonanPenambahan::with('keterangan')
            ->where('application_status', 1)
            ->where(function($query) use ($carian) {
                $query->where('application_date', 'like', "%$carian%")
                      ->orWhere('application_no', 'like', "%$carian%");
            })
            ->get();

        $listPerubahan = PermohonanPerubahan::with('keterangan')
            ->where('application_status', 1)
            ->where(function($query) use ($carian) {
                $query->where('application_date', 'like', "%$carian%")
                      ->orWhere('application_no', 'like', "%$carian%");
            })
            ->get();
        
        return view('pages.permohonan-maklumat-rawatan.index', compact('tindakan', 'countPermohonan', 'countPenambahan', 'countPerubahan', 'listPenambahan', 'listPerubahan'));
    }
    public function TindakanPenambahanAgensi(Request $request){
        $request->validate([
            'application_id' => 'required',
            'application_status' => 'required',
            'action_application_date' => 'required',
            'action_application_remark' => 'required',
            'action_application_officer' => 'required',
            'action_application_role' => 'required',
            'action_application_agensi_name' => 'required',
        ]);

        $penambahan = PermohonanPenambahan::find($request->application_id);
        $penambahan->application_status = $request->application_status;
        $penambahan->save();

        $tindakan = new TindakanAgensi([
            'action_application_date' => $request->action_application_date,
            'action_application_remark' => $request->action_application_remark,
            'action_application_officer' => $request->action_application_officer,
            'action_application_role' => $request->action_application_role,
            'action_application_agensi_name' => $request->action_application_agensi_name,
        ]);

        $penambahan->tindakanAgensis()->save($tindakan);

        return redirect()->route('senarai-permohonan-maklumat-rawatan')->with('message', 'Tindakan added successfully');
    }
    public function TindakanPerubahanAgensi(Request $request){
        $request->validate([
            'application_id' => 'required',
            'application_status' => 'required',
            'action_application_date' => 'required',
            'action_application_remark' => 'required',
            'action_application_officer' => 'required',
            'action_application_role' => 'required',
            'action_application_agensi_name' => 'required',
        ]);

        $penambahan = PermohonanPerubahan::find($request->application_id);
        $penambahan->application_status = $request->application_status;
        $penambahan->save();

        $tindakan = new TindakanAgensi([
            'action_application_date' => $request->action_application_date,
            'action_application_remark' => $request->action_application_remark,
            'action_application_officer' => $request->action_application_officer,
            'action_application_role' => $request->action_application_role,
            'action_application_agensi_name' => $request->action_application_agensi_name,
        ]);

        $penambahan->tindakanAgensis()->save($tindakan);

        return redirect()->route('senarai-permohonan-maklumat-rawatan')->with('message', 'Tindakan added successfully');
    }
    public function TindakanPenambahanDoktor(Request $request){
        $request->validate([
            'application_id' => 'required',
            'application_status' => 'required',
            'action_application_date' => 'required',
            'action_application_remark' => 'required',
            'action_application_officer' => 'required',
        ]);

        $penambahan = PermohonanPenambahan::find($request->application_id);
        $penambahan->application_status = $request->application_status;
        $penambahan->save();

        $tindakan = new TindakanAgensi([
            'action_application_date' => $request->action_application_date,
            'action_application_remark' => $request->action_application_remark,
            'action_application_officer' => $request->action_application_officer,
        ]);

        $penambahan->tindakanAgensis()->save($tindakan);

        return redirect()->route('senarai-permohonan-maklumat-rawatan')->with('message', 'Tindakan added successfully');
    }
    public function TindakanPerubahanDoktor(Request $request){
        $request->validate([
            'application_id' => 'required',
            'application_status' => 'required',
            'action_application_date' => 'required',
            'action_application_remark' => 'required',
            'action_application_officer' => 'required',
        ]);

        $penambahan = PermohonanPerubahan::find($request->application_id);
        $penambahan->application_status = $request->application_status;
        $penambahan->save();

        $tindakan = new TindakanAgensi([
            'action_application_date' => $request->action_application_date,
            'action_application_remark' => $request->action_application_remark,
            'action_application_officer' => $request->action_application_officer,
        ]);

        $penambahan->tindakanAgensis()->save($tindakan);

        return redirect()->route('senarai-permohonan-maklumat-rawatan')->with('message', 'Tindakan added successfully');
    }

}
