<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajRundingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amaun',
        'fk_clinic',
        'status',
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'fk_clinic');
    }
}
