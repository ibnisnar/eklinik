<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kliniks';
    protected $fillable = [
        'clinic_name',
        'clinic_branch',
        'clinic_address',
        'clinic_ssm',
        'clinic_type',
        'clinic_prefix',
        'clinic_status',
    ];

    public function userKliniks()
    {
        return $this->hasMany(UserKlinik::class, 'user_clinic_fk_clinic');
    }

    public function cajRundingan()
    {
        return $this->hasMany(CajRundingan::class, 'caj_rundingan_fk_clinic');
    }
}
