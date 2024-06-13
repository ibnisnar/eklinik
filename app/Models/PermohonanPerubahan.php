<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanPerubahan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'permohonan_perubahans';
    protected $fillable = [
        'application_date',
        'application_no',
        'application_fk_clinic',
        'application_fk_user',
        'application_status',
    ];

    public function tindakanAgensis()
    {
        return $this->morphMany(TindakanAgensi::class, 'actionable');
    }

    public function tindakanDoktor()
    {
        return $this->morphMany(TindakanDoktor::class, 'actionable');
    }
    
    public function keterangan()
    {
        return $this->hasMany(KeteranganPerubahan::class, 'fk_application');
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
