<?php

namespace App\Livewire\Pages\Klinik;

use Livewire\Component;
use App\Models\Klinik;

class SenaraiKlinik extends Component
{
    public $kliniks;
    public $name;
    public $branch;
    public $ssm;
    public $address;
    public $type;
    public $prefix;
    public $status; // Add status for creation
    public $editKlinikId;
    public $editName;
    public $editBranch;
    public $editSsm;
    public $editAddress;
    public $editType;
    public $editPrefix;
    public $editStatus; // Add status for editing
    public $deleteKlinikId = null;

    public function mount()
    {
        $this->kliniks = Klinik::all();
    }

    public function createKlinik()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'branch' => 'nullable|string|max:255',
            'ssm' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'prefix' => 'nullable|string|max:255',
            'status' => 'required|boolean', // Validate the status field
        ]);

        Klinik::create([
            'name' => $this->name,
            'branch' => $this->branch,
            'ssm' => $this->ssm,
            'address' => $this->address,
            'type' => $this->type,
            'prefix' => $this->prefix,
            'status' => $this->status, // Set status
        ]);

        $this->kliniks = Klinik::all();
        $this->reset('name', 'branch', 'ssm', 'address', 'type', 'prefix', 'status');
        return redirect()->route('klinik.index')->with('message', 'Klinik Berjaya Ditambah.');
    }

    public function openEditModal($klinikId)
    {
        $klinik = Klinik::find($klinikId);
        if ($klinik) {
            $this->editKlinikId = $klinik->id;
            $this->editName = $klinik->name;
            $this->editBranch = $klinik->branch;
            $this->editSsm = $klinik->ssm;
            $this->editAddress = $klinik->address;
            $this->editType = $klinik->type;
            $this->editPrefix = $klinik->prefix;
            $this->editStatus = $klinik->status; // Load status for editing
        }
    }

    public function updateKlinik()
    {
        $this->validate([
            'editName' => 'required|string|max:255',
            'editBranch' => 'nullable|string|max:255',
            'editSsm' => 'nullable|string|max:255',
            'editAddress' => 'nullable|string|max:255',
            'editType' => 'nullable|string|max:255',
            'editPrefix' => 'nullable|string|max:255',
            'editStatus' => 'required|boolean', // Validate the status field
        ]);

        $klinik = Klinik::find($this->editKlinikId);
        if ($klinik) {
            $klinik->update([
                'name' => $this->editName,
                'branch' => $this->editBranch,
                'ssm' => $this->editSsm,
                'address' => $this->editAddress,
                'type' => $this->editType,
                'prefix' => $this->editPrefix,
                'status' => $this->editStatus, // Update status
            ]);

            $this->kliniks = Klinik::all();
            return redirect()->route('klinik.index')->with('message', 'Klinik Berjaya Dikemaskini.');
        }
    }

    public function confirmDeleteKlinik($klinikId)
    {
        $this->deleteKlinikId = $klinikId;
    }

    public function deleteKlinik()
    {
        $klinik = Klinik::find($this->deleteKlinikId);
        if ($klinik) {
            $klinik->delete();

            $this->kliniks = Klinik::all();
            $this->deleteKlinikId = null;

            return redirect()->route('klinik.index')->with('message', 'Klinik Berjaya Dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.pages.klinik.senarai-klinik', [
            'kliniks' => $this->kliniks
        ])->layout('layouts.app');
    }
}
