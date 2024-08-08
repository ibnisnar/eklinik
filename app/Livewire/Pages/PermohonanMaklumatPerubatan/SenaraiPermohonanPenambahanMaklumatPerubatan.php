<?php

namespace App\Livewire\Pages\PermohonanMaklumatPerubatan;

use Livewire\Component;
use App\Models\PermohonanMaklumatPerubatan;
use App\Models\Klinik;
use App\Models\User;

class SenaraiPermohonanPenambahanMaklumatPerubatan extends Component
{

    public $permohonans;
    public $deletePermohonanId = null;

    public function mount()
    {
        $this->permohonans = PermohonanMaklumatPerubatan::where('permohonan_type', 'penambahan')->get();
    }

    public function confirmDeletePermohonanMaklumatPerubatan($permohonanId)
    {
        $this->deletePermohonanId = $permohonanId;
    }

    public function deletePermohonanMaklumatPerubatan()
    {
        $permohonan = PermohonanMaklumatPerubatan::find($this->deletePermohonanId);
        if ($permohonan) {
            $permohonan->delete();

            $this->deletePermohonanId = null;
            return redirect()->route('senarai-permohonan-penambahan-maklumat-perubatan.index')->with('message', 'Permohonan Maklumat Perubatan Berjaya Dihapus.');
        }
    }


    public function render()
    {
        return view('livewire.pages.permohonan-maklumat-perubatan.senarai-permohonan-penambahan-maklumat-perubatan')->layout('layouts.app');
    }
}
