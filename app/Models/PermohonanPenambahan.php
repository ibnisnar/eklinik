<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanPenambahan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'permohonan_penambahans';
    protected $fillable = [
        'application_date',
        'application_no',
        'application_fk_clinic',
        'application_fk_user',
        'application_status',
    ];

    public function keterangan()
    {
        return $this->hasMany(KeteranganPenambahan::class, 'fk_application');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'application_fk_user');
    }

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'application_fk_clinic');
    }
}
