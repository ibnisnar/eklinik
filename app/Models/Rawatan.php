<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'rawatans';
    protected $fillable = [
        'rawatan_name',
        'rawatan_fk_clinic',
        'rawatan_status',
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'rawatan_fk_clinic');
    }
}
