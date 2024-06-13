<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKlinik extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'user_kliniks';
    protected $fillable = [
        'user_clinic_name',
        'user_clinic_type',
        'user_clinic_reference_id',
        'user_clinic_email',
        'user_clinic_fk_clinic',
        'user_clinic_roles',
        'user_clinic_status',
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'user_clinic_fk_clinic');
    }
}
