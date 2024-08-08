<?php

namespace App\Livewire\Pages\PermohonanMaklumatPerubatan;

use Livewire\Component;
use App\Models\PermohonanMaklumatPerubatan;
use App\Models\Klinik;
use App\Models\User;

class TambahPermohonanPenambahan extends Component
{
    public $permohonans;
    public $permohonan_date;
    public $permohonan_type;
    public $permohonan_no;
    public $permohonan_fk_user;
    public $permohonan_status;
    public $permohonan_perubatan = [];
    public $permohonan_item = [];
    public $permohonan_amaun = [];

    public function mount()
    {
        $latestApplication = PermohonanMaklumatPerubatan::where('permohonan_type', 'penambahan')->orderBy('id', 'desc')->first();
        $year = date('y');
        $number = $latestApplication ? intval(substr($latestApplication->permohonan_no, 4)) + 1 : 1;
        $this->permohonan_no = 'PT' . $year . str_pad($number, 3, '0', STR_PAD_LEFT);
        $this->permohonan_type = 'penambahan';
        $this->permohonan_date = date('d-m-Y');
        $this->rows = [
            ['permohonan_perubatan' => '', 'permohonan_item' => '', 'permohonan_amaun' => '']
        ];
    }

    public $rows = [];
    
    public function addRow()
    {
        $this->rows[] = ['permohonan_perubatan' => '', 'permohonan_item' => '', 'permohonan_amaun' => ''];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows); // Reindex the array
    }

    public function createPermohonanMaklumatPerubatan()
    {
        $this->validate([
            'rows.*.permohonan_perubatan' => 'required|string',
            'rows.*.permohonan_item' => 'required|string',
            'rows.*.permohonan_amaun' => 'required|numeric'
        ]);

        $permohonan = PermohonanMaklumatPerubatan::create([
            'permohonan_date' => $this->permohonan_date,
            'permohonan_type' => $this->permohonan_type,
            'permohonan_no' => $this->permohonan_no,
            'permohonan_fk_user' => auth()->user()->id,
            'permohonan_status' => 1,
        ]);

        if ($permohonan) {
            foreach ($this->rows as $row) {
                $permohonan->keterangan()->create($row);
            }

            $this->reset('rows');
            $this->rows = [['permohonan_perubatan' => '', 'permohonan_item' => '', 'permohonan_amaun' => '']];
            return redirect()->route('senarai-permohonan-penambahan-maklumat-perubatan.index')->with('message', 'Permohonan Maklumat Perubatan Berjaya DiHantar');
        } else {
            return redirect()->route('senarai-permohonan-penambahan-maklumat-perubatan.index')->with('message', 'Permohonan Maklumat Perubatan Tidak Berjaya DiHantar');
        }
    }

    public function render()
    {
        return view('livewire.pages.permohonan-maklumat-perubatan.tambah-permohonan-penambahan')->layout('layouts.app');
    }
}
