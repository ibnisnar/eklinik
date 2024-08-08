<?php

namespace App\Livewire\Pages\UjianMakmal;

use Livewire\Component;
use App\Models\Klinik;
use App\Models\UjianMakmal;

class SenaraiUjianMakmal extends Component
{
    public $ujianMakmal;
    public $kliniks;
    public $name;
    public $amaun;
    public $fk_clinic;
    public $lab;
    public $status;
    public $editUjianMakmalId;
    public $editName;
    public $editAmaun;
    public $editFkClinic;
    public $editLab;
    public $editStatus;
    public $deleteUjianMakmalId = null;

    public function mount()
    {
        $this->kliniks = Klinik::all();
        $this->ujianMakmal = UjianMakmal::all();
    }

    public function createUjianMakmal()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'amaun' => 'required|string|max:255',
            'fk_clinic' => 'nullable|exists:kliniks,id',
            'lab' => 'required|string|max:255',
            'status' => 'required|string|in:0,1',
        ]);

        UjianMakmal::create([
            'name' => $this->name,
            'amaun' => $this->amaun,
            'fk_clinic' => $this->fk_clinic,
            'lab' => $this->lab,
            'status' => $this->status,
        ]);

        $this->reset('name', 'amaun', 'fk_clinic', 'lab', 'status');
        return redirect()->route('ujian-makmal.index')->with('message', 'Ujian Makmal Berjaya Ditambah.');
    }

    public function openEditModal($ujianMakmalId)
    {
        $ujianMakmal = UjianMakmal::find($ujianMakmalId);
        if ($ujianMakmal) {
            $this->editUjianMakmalId = $ujianMakmal->id;
            $this->editName = $ujianMakmal->name;
            $this->editAmaun = $ujianMakmal->amaun;
            $this->editFkClinic = $ujianMakmal->fk_clinic;
            $this->editLab = $ujianMakmal->lab;
            $this->editStatus = $ujianMakmal->status;
        }
    }

    public function updateUjianMakmal()
    {
        $this->validate([
            'editName' => 'required|string|max:255',
            'editAmaun' => 'required|string|max:255',
            'editFkClinic' => 'nullable|exists:kliniks,id',
            'editLab' => 'required|string|max:255',
            'editStatus' => 'required|string|in:0,1',
        ]);

        $ujianMakmal = UjianMakmal::find($this->editUjianMakmalId);
        if ($ujianMakmal) {
            $ujianMakmal->update([
                'name' => $this->editName,
                'amaun' => $this->editAmaun,
                'fk_clinic' => $this->editFkClinic,
                'lab' => $this->editLab,
                'status' => $this->editStatus,
            ]);

            $this->reset('editUjianMakmalId', 'editName', 'editAmaun', 'editFkClinic', 'editLab', 'editStatus');
            return redirect()->route('ujian-makmal.index')->with('message', 'Ujian Makmal Berjaya Dikemaskini.');
        }
    }

    public function confirmDeleteUjianMakmal($ujianMakmalId)
    {
        $this->deleteUjianMakmalId = $ujianMakmalId;
    }

    public function deleteUjianMakmal()
    {
        $ujianMakmal = UjianMakmal::find($this->deleteUjianMakmalId);
        if ($ujianMakmal) {
            $ujianMakmal->delete();

            $this->deleteUjianMakmalId = null;
            return redirect()->route('ujian-makmal.index')->with('message', 'Ujian Makmal Berjaya Dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.pages.ujian-makmal.senarai-ujian-makmal')->layout('layouts.app');
    }
}
