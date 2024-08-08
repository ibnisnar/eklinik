<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganPermohonanMaklumatPerubatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'permohonan_perubatan',
        'permohonan_item',
        'permohonan_amaun',
    ];

    public function permohonanMaklumatPerubatan()
    {
        return $this->belongsTo(PermohonanMaklumatPerubatan::class, 'fk_permohonan');
    }
}
