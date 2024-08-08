<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanMaklumatPerubatan extends Model
{
    use HasFactory;

    protected $table = 'permohonan_maklumat_perubatans';

    protected $fillable = [
        'permohonan_date',
        'permohonan_type',
        'permohonan_no',
        'permohonan_fk_user',
        'permohonan_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'permohonan_fk_user');
    }

    public function tindakan()
    {
        return $this->hasMany(TindakanPermohonanMaklumatPerubatan::class, 'tindakan_permohonan_no', 'permohonan_no');
    }

    public function keterangan()
    {
        return $this->hasMany(KeteranganPermohonanMaklumatPerubatan::class, 'fk_permohonan');
    }
}
