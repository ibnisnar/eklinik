<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;

class SuperAdmin extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.super-admin')->layout('layouts.app');
    }
}
