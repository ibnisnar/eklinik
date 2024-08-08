<?php

namespace App\Livewire\Pages\Rawatan;

use Livewire\Component;
use App\Models\Klinik;
use App\Models\Rawatan;

class SenaraiRawatan extends Component
{
    public $rawatans;
    public $kliniks;
    public $name;
    public $fk_clinic;
    public $status;
    public $editRawatanId;
    public $editName;
    public $editFkClinic;
    public $editStatus;
    public $deleteRawatanId = null;

    public function mount()
    {
        $this->kliniks = Klinik::all();
        $this->rawatans = Rawatan::all();
    }

    public function createRawatan()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'fk_clinic' => 'nullable|exists:kliniks,id',
            'status' => 'required|string|in:0,1',
        ]);

        Rawatan::create([
            'name' => $this->name,
            'fk_clinic' => $this->fk_clinic,
            'status' => $this->status,
        ]);

        $this->reset('name', 'fk_clinic', 'status');
        return redirect()->route('rawatan.index')->with('message', 'Rawatan Berjaya Ditambah.');
    }

    public function openEditModal($rawatanId)
    {
        $rawatan = Rawatan::find($rawatanId);
        if ($rawatan) {
            $this->editRawatanId = $rawatan->id;
            $this->editName = $rawatan->name;
            $this->editFkClinic = $rawatan->fk_clinic;
            $this->editStatus = $rawatan->status;
        }
    }

    public function updateRawatan()
    {
        $this->validate([
            'editName' => 'required|string|max:255',
            'editFkClinic' => 'nullable|exists:kliniks,id',
            'editStatus' => 'required|string|in:0,1',
        ]);

        $rawatan = Rawatan::find($this->editRawatanId);
        if ($rawatan) {
            $rawatan->update([
                'name' => $this->editName,
                'fk_clinic' => $this->editFkClinic,
                'status' => $this->editStatus,
            ]);

            $this->reset('editRawatanId', 'editName', 'editFkClinic', 'editStatus');
            return redirect()->route('rawatan.index')->with('message', 'Rawatan Berjaya Dikemaskini.');
        }
    }

    public function confirmDeleteRawatan($rawatanId)
    {
        $this->deleteRawatanId = $rawatanId;
    }

    public function deleteRawatan()
    {
        $rawatan = Rawatan::find($this->deleteRawatanId);
        if ($rawatan) {
            $rawatan->delete();

            $this->deleteRawatanId = null;
            return redirect()->route('rawatan.index')->with('message', 'Rawatan Berjaya Dihapus.');
        }
    }
    public function render()
    {
        return view('livewire.pages.rawatan.senarai-rawatan')->layout('layouts.app');
    }
}
