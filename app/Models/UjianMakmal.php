<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianMakmal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'ujian_makmals';
    protected $fillable = [
        'ujian_makmal_name',
        'ujian_makmal_amaun',
        'ujian_makmal_fk_clinic',
        'ujian_makmal_lab',
        'ujian_makmal_status',
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'ujian_makmal_fk_clinic');
    }
}
