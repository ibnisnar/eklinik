<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanPermohonanMaklumatPerubatan extends Model
{
    use HasFactory;

    protected $table = 'tindakan_permohonan_maklumat_perubatans';

    public function permohonan()
    {
        return $this->belongsTo(PermohonanMaklumatPerubatan::class, 'tindakan_permohonan_no', 'permohonan_no');
    }
}