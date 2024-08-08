<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\PermohonanMaklumatPerubatan;

class Agensi extends Component
{
    public $permohonanPenambahan;
    public $permohonanPerubahan;

    public function mount()
    {
        $this->permohonanPenambahan = PermohonanMaklumatPerubatan::where('permohonan_type', 'penambahan')->where('permohonan_status', 1)->get();
        $this->permohonanPerubahan = PermohonanMaklumatPerubatan::where('permohonan_type', 'perubahan')->where('permohonan_status', 1)->get();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.agensi')->layout('layouts.app');
    }
}
