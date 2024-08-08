<?php

namespace App\Livewire\Pages\Laporan;

use Livewire\Component;

class LaporanRingkasanTuntutanPerubatan extends Component
{
    public function render()
    {
        return view('livewire.pages.laporan.laporan-ringkasan-tuntutan-perubatan')->layout('layouts.app');
    }
}
