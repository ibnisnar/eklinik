<?php

namespace App\Livewire\Pages\CajRundingan;

use Livewire\Component;
use App\Models\Klinik;
use App\Models\CajRundingan;

class SenaraiCajRundingan extends Component
{
    public $cajRundingans;
    public $kliniks;
    public $search = ''; // Add search property

    public $name;
    public $amaun;
    public $fk_clinic;
    public $status;
    public $editCajRundinganId;
    public $editName;
    public $editAmaun;
    public $editFkClinic;
    public $editStatus;
    public $deleteCajRundinganId = null;

    public function mount()
    {
        $this->kliniks = Klinik::all();
        $this->cajRundingans = CajRundingan::all();
    }

    public function createCajRundingan()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'amaun' => 'required|string|max:255',
            'fk_clinic' => 'nullable|exists:kliniks,id',
            'status' => 'required|string|in:0,1',
        ]);

        CajRundingan::create([
            'name' => $this->name,
            'amaun' => $this->amaun,
            'fk_clinic' => $this->fk_clinic,
            'status' => $this->status,
        ]);

        $this->reset('name', 'amaun', 'fk_clinic', 'status');
        return redirect()->route('caj-rundingan.index')->with('message', 'Caj Rundingan Berjaya Ditambah.');
    }

    public function openEditModal($cajRundinganId)
    {
        $cajRundingan = CajRundingan::find($cajRundinganId);
        if ($cajRundingan) {
            $this->editCajRundinganId = $cajRundingan->id;
            $this->editName = $cajRundingan->name;
            $this->editAmaun = $cajRundingan->amaun;
            $this->editFkClinic = $cajRundingan->fk_clinic;
            $this->editStatus = $cajRundingan->status;
        }
    }

    public function updateCajRundingan()
    {
        $this->validate([
            'editName' => 'required|string|max:255',
            'editAmaun' => 'required|string|max:255',
            'editFkClinic' => 'nullable|exists:kliniks,id',
            'editStatus' => 'required|string|in:0,1',
        ]);

        $cajRundingan = CajRundingan::find($this->editCajRundinganId);
        if ($cajRundingan) {
            $cajRundingan->update([
                'name' => $this->editName,
                'amaun' => $this->editAmaun,
                'fk_clinic' => $this->editFkClinic,
                'status' => $this->editStatus,
            ]);

            $this->reset('editCajRundinganId', 'editName', 'editAmaun', 'editFkClinic', 'editStatus');
            return redirect()->route('caj-rundingan.index')->with('message', 'Caj Rundingan Berjaya Dikemaskini.');
        }
    }

    public function confirmDeleteCajRundingan($cajRundinganId)
    {
        $this->deleteCajRundinganId = $cajRundinganId;
    }

    public function deleteCajRundingan()
    {
        $cajRundingan = CajRundingan::find($this->deleteCajRundinganId);
        if ($cajRundingan) {
            $cajRundingan->delete();

            $this->deleteCajRundinganId = null;
            return redirect()->route('caj-rundingan.index')->with('message', 'Caj Rundingan Berjaya Dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.pages.caj-rundingan.senarai-caj-rundingan')->layout('layouts.app');
    }
}

