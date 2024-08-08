<?php

namespace App\Livewire\Pages\Ubatan;

use Livewire\Component;
use App\Models\Klinik;
use App\Models\Ubatan;

class SenaraiUbatan extends Component
{
    public $ubatans;
    public $kliniks;
    public $name;
    public $amaun;
    public $fk_clinic;
    public $status;
    public $editUbatanId;
    public $editName;
    public $editAmaun;
    public $editFkClinic;
    public $editStatus;
    public $deleteUbatanId = null;

    public function mount()
    {
        $this->kliniks = Klinik::all();
        $this->ubatans = Ubatan::all();
    }

    public function createUbatan()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'amaun' => 'required|string|max:255',
            'fk_clinic' => 'nullable|exists:kliniks,id',
            'status' => 'required|string|in:0,1',
        ]);

        Ubatan::create([
            'name' => $this->name,
            'amaun' => $this->amaun,
            'fk_clinic' => $this->fk_clinic,
            'status' => $this->status,
        ]);

        $this->reset('name', 'amaun', 'fk_clinic', 'status');
        return redirect()->route('ubatan.index')->with('message', 'Ubatan Berjaya Ditambah.');
    }

    public function openEditModal($ubatanId)
    {
        $ubatan = Ubatan::find($ubatanId);
        if ($ubatan) {
            $this->editUbatanId = $ubatan->id;
            $this->editName = $ubatan->name;
            $this->editAmaun = $ubatan->amaun;
            $this->editFkClinic = $ubatan->fk_clinic;
            $this->editStatus = $ubatan->status;
        }
    }

    public function updateUbatan()
    {
        $this->validate([
            'editName' => 'required|string|max:255',
            'editAmaun' => 'required|string|max:255',
            'editFkClinic' => 'nullable|exists:kliniks,id',
            'editStatus' => 'required|string|in:0,1',
        ]);

        $ubatan = Ubatan::find($this->editUbatanId);
        if ($ubatan) {
            $ubatan->update([
                'name' => $this->editName,
                'amaun' => $this->editAmaun,
                'fk_clinic' => $this->editFkClinic,
                'status' => $this->editStatus,
            ]);

            $this->reset('editUbatanId', 'editName', 'editAmaun', 'editFkClinic', 'editStatus');
            return redirect()->route('ubatan.index')->with('message', 'Ubatan Berjaya Dikemaskini.');
        }
    }

    public function confirmDeleteUbatan($ubatanId)
    {
        $this->deleteUbatanId = $ubatanId;
    }

    public function deleteUbatan()
    {
        $ubatan = Ubatan::find($this->deleteUbatanId);
        if ($ubatan) {
            $ubatan->delete();

            $this->deleteUbatanId = null;
            return redirect()->route('ubatan.index')->with('message', 'Ubatan Berjaya Dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.pages.ubatan.senarai-ubatan')->layout('layouts.app');
    }
}
