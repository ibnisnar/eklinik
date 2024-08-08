<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch',
        'ssm',
        'address',
        'type',
        'prefix',
        'status',
    ];

    public function cajRundingans()
    {
        return $this->hasMany(CajRundingan::class, 'fk_clinic');
    }

    public function rawatans()
    {
        return $this->hasMany(Rawatan::class, 'fk_clinic');
    }

    public function ubatans()
    {
        return $this->hasMany(Ubatan::class, 'fk_clinic');
    }

    public function ujianMakmals()
    {
        return $this->hasMany(UjianMakmal::class, 'fk_clinic');
    }
}
