<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;

class Doctor extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.doctor')->layout('layouts.app');
    }
}
