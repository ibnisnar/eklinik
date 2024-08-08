<?php

namespace App\Livewire\Pages\PermohonanMaklumatPerubatan\Tindakan;

use Livewire\Component;
use App\Models\PermohonanMaklumatPerubatan;

class Agensi extends Component
{
    public $permohonan_no;
    public $permohonan;

    public function mount($permohonan_no)
    {
        $this->permohonan_no = $permohonan_no;
        $this->permohonan = PermohonanMaklumatPerubatan::where('permohonan_no', $this->permohonan_no)->first();
    }
    
    public function render()
    {
        return view('livewire.pages.permohonan-maklumat-perubatan.tindakan.agensi')->layout('layouts.app');
    }
}
